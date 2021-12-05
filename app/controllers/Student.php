<?php
class Student extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->lectureUserModel = $this->model('Lecture_User');
        $this->gradeModel = $this->model('Grade');
    }

    public function index($userId) {
        $this->view('items/student', [
            'user' =>  $this->userModel->getUser($userId),
            'userLectureList' => $this->lectureUserModel->getUserLectures($userId),
            'gradesList' => $this->gradeModel->getUserGradeList($userId)
        ]);
    }

    public function addUserLecture() {
        if(emptyPOST( $_POST)) {
            return;
        }
        $cond = $this->lectureUserModel->addUserLecture($_POST['lectureId'], $_POST['userId']);

        if($cond) {
            header('location: ' . URLROOT . '/student/' . $_POST['userId']);
        } else {
            die('error');
        }
    }

    public function deleteUserLecture($lectureUserId, $userId) {
        if(empty($lectureUserId)) {
            return;
        }

        $cond = $this->lectureUserModel->deleteUserLecture($lectureUserId);
        if($cond) {
            header('location: ' . URLROOT . '/student/' . $userId);
        } else {
            die('error');
        }

    }
}
