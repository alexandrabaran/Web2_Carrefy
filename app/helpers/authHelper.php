<?php

class authHelper {

    public static function init() {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
    }

    public static function login($user) {
        authHelper::init();
        $_SESSION['USER_ID'] = $user->admin_id;
        $_SESSION['USER_NAME'] = $user->admin_user;
    }

    public static function verify() {
        authHelper::init();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

    public static function logout() {
        authHelper::init();
        session_destroy();
        header('Location: ' . BASE_URL . 'login');
    }
}