<?php
    session_start();

    function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    function xlog($var) {
        print_r($var);
        die();
    }

    function randomPass($length) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }

    function emptyPOST($post) {

        foreach ($post as $item) {
            if(empty($item)) {
                return true;
            }
        }

        return false;
    }

    function setInitialData($data) {
        $arr = [];
        $arr['username'] = strtolower($data['firstName']);
        $arr['password'] = strtolower($data['lastName']);
        $arr['FullName'] = ucfirst($data['firstName']) . ' ' . ucfirst($data['lastName']);
        $arr['email'] = strtolower($data['firstName']) . '.' . strtolower($data['lastName']) . '@ad.viko.lt';

        return $arr;
    }

