<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }


    public function getUser($userId) {

        if(empty($userId)) {
            return;
        }

        $this->db->query('SELECT * FROM users JOIN groups on users.GroupId = groups.GroupId WHERE UserId = :userId');

        $this->db->bind(':userId', $userId);

        return $this->db->single();
    }

    public function deleteUser($userId) {
        $this->db->query('DELETE FROM users WHERE UserId = :userId');

        $this->db->bind(':userId', $userId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //Bind values
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //Bind value
        $this->db->bind(':username', $username);

        $row = $this->db->single();


        if ($password === $row->password) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Studentai
    public function getStudentList() {
        $this->db->query(
        'SELECT * 
        FROM users 
        JOIN groups on users.GroupId = groups.GroupId
        WHERE RoleId = :STUDENT_ID
        ');
        $this->db->bind(':STUDENT_ID', STUDENT_ID);

        return $this->db->resultSet();
    }

    
    public function setStudent($data) {
        $initials = setInitialData($data);
        
        $this->db->query('INSERT INTO users (username, password, email, RoleId, GroupId) values(:username, :email, :password, :roleId, :groupId)');
        
        $this->db->bind(':username', $initials['username']);
        $this->db->bind(':password', $initials['password']);
        $this->db->bind(':email', $initials['email']);
        $this->db->bind(':roleId', STUDENT_ID);
        $this->db->bind(':groupId', $data['groupId']);
        
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }

    // Destytojai
    public function getLecturerList() {
        $this->db->query('SELECT * FROM users WHERE RoleId = :LECTURER_ID');
        $this->db->bind(':LECTURER_ID', LECTURER_ID);

        return $this->db->resultSet();
    }

    public function setLecturer($data) {
        $initials = setInitialData($data);


        $this->db->query('INSERT INTO users (username, email, password, RoleId) values(:username, :email, :password, :roleId)');

        $this->db->bind(':username', $initials['username']);
        $this->db->bind(':password', $initials['password']);
        $this->db->bind(':email', $initials['email']);
        $this->db->bind(':roleId', LECTURER_ID);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    
}
