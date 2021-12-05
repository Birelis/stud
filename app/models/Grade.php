<?php
class Grade {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getUserGradeList($userId) {
        $this->db->query('SELECT * FROM grades WHERE UserId = :userId');
        $this->db->bind(':userId', $userId);

        return $this->db->resultSet();
    }
}