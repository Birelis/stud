<?php
class Lecture {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getLectureById($lectureId) {
        $this->db->query('SELECT * FROM lectures WHERE LectureId = :lectureId');

        $this->db->bind(':lectureId', $lectureId);

        return $this->db->single();
    }

    public function getLectureList() {
        $this->db->query('SELECT * FROM lectures');

        return $this->db->resultSet();
    }

    public function setLecture($data) {
        $this->db->query('INSERT INTO lectures (Name) values(:Name)');

        $this->db->bind(':Name', $data['Name']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function deleteLecture($lectureId) {
        $this->db->query('DELETE FROM lectures WHERE LectureId = :lectureId');
        $this->db->bind(':lectureId', $lectureId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


}