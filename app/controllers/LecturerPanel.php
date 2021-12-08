<?php
class LecturerPanel extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->lectureLecturersModel = $this->model('Lecture_Lecturer');
        $this->lectureUsersModel = $this->model('Lecture_User');
        $this->lectureModel = $this->model('Lecture');
        $this->gradeModel = $this->model('Grade');
    }

    public function index() {
        $this->view('lecturer', [
            'lecturesList' => $this->lectureLecturersModel->getLecturerLectures($_SESSION['user_id'])
        ]);
    }

    public function lecture($lectureId) {
        if(empty($lectureId)) {
            header('location: ' . URLROOT . '/lecturerPanel');
        }
        $this->view('lecturer_items/lecture', [
            'lecture' => $this->lectureModel->getLectureById($lectureId),
            'studentList' => $this->lectureUsersModel->getLectureUsers($lectureId)
        ]);
    }

    public function student($userId) {
        if(empty($userId)) {
            header('location: ' . URLROOT . '/lecturerPanel');
        }
        $this->view('lecturer_items/student', [
            'student' => $this->userModel->getUser($userId),
            'gradeList' => $this->gradeModel->getUserGradeList($userId)
        ]);
    }

    public function addGrade() {
        if(emptyPOST($_POST)) {
            return;
        }

        $cond = $this->gradeModel->setGrade($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/lecturerPanel/lecture/' . $_POST['lectureId']);
        } else {
            die('error');
        }
    }
}