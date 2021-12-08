<?php
class Lecture_Lecturer {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function getLecturerLectures($userId) {
        if(empty($userId)) {
            return;
        }
        $this->db->query('SELECT * FROM lectures_lecturers u JOIN lectures l on u.LectureId = l.LectureId WHERE UserId = :userId');
        $this->db->bind(':userId', $userId);

        return $this->db->resultSet();
    }

    public function addLecturerLecture($lectureId, $userId) {

        $this->db->query('SELECT * FROM lectures_lecturers WHERE UserId = :userId AND LectureId = :lectureId');
        $this->db->bind(':lectureId', $lectureId);
        $this->db->bind(':userId', $userId);

        if($this->db->rowCount() > 0) {
            return;
        }


        $this->db->query('INSERT INTO lectures_lecturers (LectureId, UserId) values(:lectureId, :userId)');
        $this->db->bind(':lectureId', $lectureId);
        $this->db->bind(':userId', $userId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteLecturerLecture($lectureLecturerId) {

        $this->db->query('DELETE FROM lectures_lecturers WHERE LectureLecturerId = :lectureLecturerId');

        $this->db->bind(':lectureLecturerId', $lectureLecturerId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function deleteLecturerLectures($userId) {
        $this->db->query('DELETE FROM lectures_lecturers WHERE UserId = :userId');

        $this->db->bind(':userId', $userId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

}
