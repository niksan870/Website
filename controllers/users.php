<?php

class Users extends Controller {

    protected function register() {
        if (!isset($_SESSION['is_logged_in'])) {
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->register(), true);
        } else {
            header('Location: ' . ROOT_URL);
        }
    }

    protected function login() {
        if (!isset($_SESSION['is_logged_in'])) {
            $viewmodel = new UserModel();
            $this->returnView($viewmodel->login(), true);
        } else {
            header('Location: ' . ROOT_URL);
        }
    }

    protected function profile() {
        $viewmodel = new UserModel();
        $this->returnView($viewmodel->profile(), true);
    }

    protected function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy();

        header('Location: ' . ROOT_URL);
    }

}
