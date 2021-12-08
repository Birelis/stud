<?php
class StudentPanel extends Controller {
    public function __construct() {
        $this->gradeModel = $this->model('Grade');
        $this->lectureUserModel = $this->model('Lecture_User');
        $this->lectureModel = $this->model('Lecture');
    }

    public function index() {
        $this->view('student', [
            'lecturesList' => $this->lectureUserModel->getUserLectures($_SESSION['user_id'])
        ]);
    }

    public function lecture($lectureId) {
        if(empty($lectureId)) {
            header('location: ' . URLROOT . '/studentPanel');
        }
        $this->view('student_items/lecture', [
            'lecture' => $this->lectureModel->getLectureById($lectureId),
            'gradeList' => $this->gradeModel->getUserLectureGrades($lectureId, $_SESSION['user_id'])
        ]);
    }
}