<?php

class VerifyUsers extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index() {
        $this->view('verifyUsers', [
            'userList' => $this->userModel->getUnverifiedUserList(),
        ]);
    }

    public function deleteUser($userId) {
        if(empty($userId)) {
            header('location: ' . URLROOT . '/verifyUsers');
        }
        $cond = $this->userModel->deleteUser($userId);

        if($cond) {
            header('location: ' . URLROOT . '/verifyUsers');
        } else {
            die('error');
        }
    }

    public function setRole($roleId, $userId) {
        if(empty($roleId) || empty($userId)) {
            header('location: ' . URLROOT . '/verifyUsers');
        }
        $cond = $this->userModel->setRole($userId, $roleId);
        if($cond) {
            header('location: ' . URLROOT . '/verifyUsers');
        } else {
            die('error');
        }
    }
}
