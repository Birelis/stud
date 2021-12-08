<?php

class AdminPanel extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->groupModel = $this->model('Group');
        $this->lectureModel = $this->model('Lecture');
        $this->lectureUserModel = $this->model('Lecture_User');
        $this->lectureLecturerModel = $this->model('Lecture_Lecturer');
        
        $this->gradeModel= $this->model('Grade');
    }

    public function index() {
        $this->view('admin', [
            'userList' => $this->userModel->getStudentList(),
            'lecturersList' => $this->userModel->getLecturerList(),
            'groupList' => $this->groupModel->getGroupList(),
            'lectureList' => $this->lectureModel->getLectureList(),
        ]);
    }

    // Studentai
    public function addStudent() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/adminPanel');
        }

        $condition = $this->userModel->setStudent($_POST);
        
        if($condition) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('erorr');
        }
    }
    public function deleteUser($userId) {
        if(empty($userId)) {
            header('location: ' . URLROOT . '/adminPanel');
        }

        $cond = $this->userModel->deleteUser($userId);
        if($cond) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('error');
        }
    }

    public function student($userId) {
        $this->view('admin_items/student', [
            'user' =>  $this->userModel->getUser($userId),
            'userLectureList' => $this->lectureUserModel->getUserLectures($userId),
            'gradesList' => $this->gradeModel->getUserGradeList($userId)
        ]);
    }

    public function addUserLecture() {
        if(emptyPOST( $_POST)) {
            header('location: ' . URLROOT . '/adminPanel/student/' . $_POST['userId']);
        }
        $cond = $this->lectureUserModel->addUserLecture($_POST['lectureId'], $_POST['userId']);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel/student/' . $_POST['userId']);
        } else {
            die('error');
        }
    }

    public function deleteUserLecture($lectureUserId, $userId) {
        if(empty($lectureUserId)) {
            header('location: ' . URLROOT . '/adminPanel/student/' . $userId);
        }

        $cond = $this->lectureUserModel->deleteUserLecture($lectureUserId);
        if($cond) {
            header('location: ' . URLROOT . '/adminPanel/student/' . $userId);
        } else {
            die('error');
        }

    }

    // Destytojai
    public function addLecturer() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/adminPanel');
        }

        $cond = $this->userModel->setLecturer($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('error');
        }
    }

    public function lecturer($userId) {
        $this->view('admin_items/lecturer', [
            'user' => $this->userModel->getUser($userId, 'lecturer'),
            'lecturesList' => $this->lectureLecturerModel->getLecturerLectures($userId),
        ]);
    }

    public function addLecturerLecture() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/adminPanel/lecturer/' . $_POST['userId']);
        }
        $cond = $this->lectureLecturerModel->addLecturerLecture($_POST['lectureId'], $_POST['userId']);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel/lecturer/' . $_POST['userId']);
        } else {
            die('error');
        }
    }

    public function deleteLecturerLecture($lectureLecturerId, $userId) {
        if(empty($lectureUserId)) {
            header('location: ' . URLROOT . '/adminPanel/lecturer/' . $userId);
        }

        $cond = $this->lectureLecturerModel->deleteLecturerLecture($lectureLecturerId);
        if($cond) {
            header('location: ' . URLROOT . '/adminPanel/lecturer/' . $userId);
        } else {
            die('error');
        }

    }

    // Grupes
    public function addGroup() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/adminPanel');
        }

        $cond = $this->groupModel->setGroup($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('error');
        }
    }

    public function deleteGroup($groupId) {
        if(empty($groupId)) {
            header('location: ' . URLROOT . '/adminPanel');
        }

        $cond = $this->groupModel->deleteGroup($groupId);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('error');
        }
    }

    // Lectures
    public function addLecture() {
        if(emptyPOST($_POST)) {
            header('location: ' . URLROOT . '/adminPanel');
        }

        $cond = $this->lectureModel->setLecture($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('error');
        }
    }

    public function deleteLecture($lectureId) {
        $cond = $this->lectureModel->deleteLecture($lectureId);

        if($cond) {
            header('location: ' . URLROOT . '/adminPanel');
        } else {
            die('error');
        }
    }
}