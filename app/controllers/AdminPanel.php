<?php

class AdminPanel extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
        $this->groupModel = $this->model('Group');
        $this->lectureModel = $this->model('Lecture');
    }

    public function index() {
        $this->view('admin', $data = [
            'userList' => $this->userModel->getStudentList(),
            'lecturersList' => $this->userModel->getLecturerList(),
            'groupList' => $this->groupModel->getGroupList(),
            'lectureList' => $this->lectureModel->getLectureList(),
        ]);
    }

    // Studentai
    public function addStudent() {
        if(emptyPOST($_POST)) {
            return;
        }

        $condition = $this->userModel->setStudent($_POST);
        
        if($condition) {
            header('location: ' . URLROOT . '/admin');
        } else {
            die('erorr');
        }
    }
    public function deleteUser($userId) {
        if(!empty($userId)) {
            $cond = $this->userModel->deleteUser($userId);
            if($cond) {
                header('location: ' . URLROOT . '/admin');
            } else {
                die('error');
            }
        }
    }

    // Destytojai
    public function addLecturer() {
        if(emptyPOST($_POST)) {
            return;
        }

        $cond = $this->userModel->setLecturer($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/admin');
        } else {
            die('error');
        }
    }

    // Grupes

    public function addGroup() {
        if(emptyPOST($_POST)) {
            return;
        }

        $cond = $this->groupModel->setGroup($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/admin');
        } else {
            die('error');
        }
    }

    public function deleteGroup($groupId) {

        $cond = $this->groupModel->deleteGroup($groupId);

        if($cond) {
            header('location: ' . URLROOT . '/admin');
        } else {
            die('error');
        }
    }

    public function addLecture() {
        if(emptyPOST($_POST)) {
            return;
        }

        $cond = $this->lectureModel->setLecture($_POST);

        if($cond) {
            header('location: ' . URLROOT . '/admin');
        } else {
            die('error');
        }
    }

    public function deleteLecture($lectureId) {

        $cond = $this->lectureModel->deleteLecture($lectureId);

        if($cond) {
            header('location: ' . URLROOT . '/admin');
        } else {
            die('error');
        }
    }
}