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

    public function getUserLectureGrades($lectureId, $userId) {
        $this->db->query('SELECT * FROM grades WHERE LectureId = :lectureId AND UserId = :userId');

        $this->db->bind(':lectureId', $lectureId);
        $this->db->bind(':userId', $userId);

        return $this->db->resultSet();
    }

    public function deleteGradesByUserId($userId) {
        $this->db->query('DELETE FROM grades WHERE UserId = :userId');
        $this->db->bind(':userId', $userId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function setGrade($data) {

        $this->db->query('INSERT INTO grades (UserId, LectureId, Grade) values(:userId, :lectureId, :grade)');

        $this->db->bind(':userId', $data['userId']);
        $this->db->bind(':lectureId', $data['lectureId']);
        $this->db->bind(':grade', $data['grade']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function editGrade($data) {
        $this->db->query('UPDATE grades SET Grade = :grade WHERE GradeId = :gradeId');

        $this->db->bind(':grade', $data['grade']);
        $this->db->bind(':gradeId', $data['gradeId']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteGrade($gradeId) {
        $this->db->query('DELETE FROM grades WHERE GradeId = :gradeId');

        $this->db->bind(':gradeId', $gradeId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}