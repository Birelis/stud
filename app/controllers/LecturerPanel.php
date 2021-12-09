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

    public function student($userId, $lectureId) {
        if(empty($userId) || empty($lectureId)) {
            header('location: ' . URLROOT . '/lecturerPanel');
        }
        $this->view('lecturer_items/student', [
            'student' => $this->userModel->getUser($userId),
            'gradeList' => $this->gradeModel->getUserLectureGrades($lectureId, $userId)
        ]);
    }

    public function addGrade() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/lecturerPanel');
        }

        $cond = $this->gradeModel->setGrade($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/lecturerPanel/lecture/' . $_POST['lectureId']);
        } else {
            die('error');
        }
    }

    public function editGrade() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/lecturerPanel');
        }

        $cond = $this->gradeModel->editGrade($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/lecturerPanel/student/' . $_POST['userId']);
        } else {
            die('error');
        }
    }

    public function deleteGrade($gradeId, $userId) {
        if(empty($gradeId) || empty($gradeId)) {
            header('location: ' . URLROOT . '/lecturerPanel');
        }

        $cond = $this->gradeModel->deleteGrade($gradeId);

        if($cond) {
            header('location: ' . URLROOT . '/lecturerPanel/student/' . $userId);
        } else {
            die('error');
        }
    }
}
