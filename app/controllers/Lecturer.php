<?php
class Lecturer extends Controller {
    public function __construct() {
        $this->userModel = $this->model('User');
    }

    public function index($userId) {
        $this->view('items/lecturer', [
            'user' => $this->userModel->getUser($userId),
        ]);
    }
}
