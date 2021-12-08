<?php
class Users extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function register() {
        $data = [
            'firstName' => '',
            'lastName' => '',
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'firstNameError' => '',
            'lastNameError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'firstName' => trim($_POST['firstName']),
                'lastName' => trim($_POST['lastName']),
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'usernameError' => '',
                'firstNameError' => '',
                'lastNameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            if(empty($data['firstName'])) {
                $data['firtNameError'] = 'Įveskite vardą.';
            }
            if(empty($data['lastName'])) {
                $data['lastNameError'] = 'Įveskite pavardę.';
            }
            if (empty($data['username'])) {
                $data['usernameError'] = 'Įveskite slapyvardį.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Vardas gali turėti tik raides ir skaičius.';
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'Įveskite El.paštą.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Netinkamas El. pašto formatas';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Paštas užimtas';
                }
            }

            if(empty($data['password'])){
              $data['passwordError'] = 'Iveskite slaptažodį';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Slaptažodis turi susidaryti bent jau iš 8 simbolių.';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Slaptažodis turi turėti bent vieną skaičių.';
            }

             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Iveskite slaptažodį.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Slaptažodžiai nesutampa. Bandykite dar kartą.';
                }
            }

            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'] && empty($data['firstNameError']) && empty($data['lastNameError']))) {

                // Hash password
                // $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->register($data)) {
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login() {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Iveskite slapyvardį';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Iveskite slaptažodį';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Slaptažodis netinkamas. Bandykite dar kartą';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }

    public function createUserSession($user) {
        $_SESSION['user_id'] = $user->UserId;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['role_id'] = $user->RoleId;
        header('location:' . URLROOT . '/pages/index');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['role_id']);
        header('location:' . URLROOT . '/users/login');
    }
}
