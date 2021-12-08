<?php

class User {
    private $db;
    public function __construct() {
        $this->db = new Database;

    }


    public function getUser($userId, $type = 'student') {

        if(empty($userId)) {
            return;
        }

        if($type == 'student'){
            $this->db->query('SELECT * FROM users JOIN groups on users.GroupId = groups.GroupId WHERE UserId = :userId');
        }
        else if ($type == 'lecturer') {
            $this->db->query('SELECT * FROM users WHERE UserId = :userId');
        }


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

    public function setRole($userId, $roleId) {

        $this->db->query('UPDATE users SET RoleId = :roleId WHERE UserId = :userId');

        $this->db->bind(':roleId', $roleId);

        $this->db->bind(':userId', $userId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data) {
        $FullName = ucfirst($data['firstName']) . ' ' . ucfirst($data['lastName']);
        $this->db->query('INSERT INTO users (FullName, username, email, password) VALUES(:fullName, :username, :email, :password)');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':fullName', $FullName);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        $this->db->bind(':username', $username);

        $row = $this->db->single();


        if ($password === $row->password) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');

        $this->db->bind(':email', $email);

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

    public function getUnverifiedUserList() {
        $this->db->query('SELECT * FROM users WHERE RoleId is null');
        return $this->db->resultSet();
    }

    
    public function setStudent($data) {
        $initials = setInitialData($data);
        
        $this->db->query('INSERT INTO users (FullName, username, password, email, RoleId, GroupId) values(:fullName, :username, :email, :password, :roleId, :groupId)');
        
        $this->db->bind(':fullName', $initials['FullName']);
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
