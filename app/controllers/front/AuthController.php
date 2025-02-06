<?php

namespace App\Controllers\Front;
class AuthController{

    public function __construct(){

    }
    public function register() {
        if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password'])) {
            $_SESSION['error'] = "All fields are required";
            header('Location: ../view/auth/auth.php');
            exit();
        }

        if (!isset($_POST['CSRF']) || !validateCsrfToken($_POST['CSRF'])) {
            header('Location: ../view/auth/auth.php');
            exit();
        }

        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $userId = $this->user->register($username, $email, $password);

        if (is_numeric($userId)) {
            $userData = $this->user->getUserById($userId);
            if ($userData) {
                $_SESSION['userId'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                $_SESSION['email'] = $userData['email'];
                $_SESSION['role'] = $userData['role'];

                if ($userData['role'] === User::ROLE_ADMIN) {
                    header('Location: ../view/auth/auth.php');
                } else {
                    $_SESSION["successS"] = 'Registration success / select your role';
                    header('Location: ../view/components/select-role.php');
                }
                exit();
            }
        }

        $_SESSION['error'] = "Registration failed. Please try again.";
        header('Location: ../view/auth/auth.php');
        exit();
    }

    public function login() {
        if (!isset($_POST['email']) || !isset($_POST['password'])) {
            $_SESSION["errorA"] = "All fields are required";
            header('Location: ../view/auth/auth.php');
            exit();
        }

        if (!isset($_POST['CSRF']) || !validateCsrfToken($_POST['CSRF'])) {
            header('Location: ../view/auth/auth.php');
            exit();
        }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $result = $this->user->login($email, $password);

        if ($result) {
            $_SESSION['userId'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['role'] = $result['role'];
            $_SESSION['status'] = $result['status'];

            if ($result['role'] === 'admin') {
                header('Location: ../view/admin/dashboard.php');
            } elseif ($result['role'] === 'teacher') {
                $result['status'] === 'ACTIVE'
                    ? header('Location: ../view/teacher/dashboard.php')
                    : header('location: ../index.php');
            } else {
                header('Location: ../view/student/dashboard.php');
            }
            exit();
        }

        $_SESSION["errorA"] = "Invalid email or password";
        header('Location: ../view/auth/auth.php');
        exit();
    }
}