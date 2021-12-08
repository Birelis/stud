<?php
class Lecture_User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getUserLectures($userId) {
        if(empty($userId)) {
            return;
        }
        $this->db->query('SELECT * FROM lectures_users u LEFT JOIN lectures l on u.LectureId = l.LectureId WHERE UserId = :userId');

        $this->db->bind(':userId', $userId);

        return $this->db->resultSet();
    }

    public function addUserLecture($lectureId, $userId) {

        $this->db->query('SELECT * FROM lectures_users WHERE UserId = :userId AND LectureId = :lectureId');
        $this->db->bind(':lectureId', $lectureId);
        $this->db->bind(':userId', $userId);

        if($this->db->rowCount() > 0) {
            return;
        }


        $this->db->query('INSERT INTO lectures_users (LectureId, UserId) values(:lectureId, :userId)');
        $this->db->bind(':lectureId', $lectureId);
        $this->db->bind(':userId', $userId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUserLecture($lectureUserId) {

        $this->db->query('DELETE FROM lectures_users WHERE LectureUserId = :lectureUserId');

        $this->db->bind(':lectureUserId', $lectureUserId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteUserLectures($userId) {
        $this->db->query('DELETE FROM lectures_users WHERE UserId = :userId');

        $this->db->bind(':userId', $userId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function getLectureUsers($lectureId) {
        $this->db->query('SELECT * FROM lectures_users l LEFT JOIN users u ON l.UserId = u.UserId  WHERE LectureId = :lectureId');

        $this->db->bind(':lectureId', $lectureId);

        return $this->db->resultSet();
    }
}