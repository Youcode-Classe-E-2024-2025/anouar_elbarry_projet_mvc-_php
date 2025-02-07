<?php

namespace App\Controllers\Front;

use App\Core\View;
use App\Core\Database;
use App\Core\Security;
use App\Core\Session;
use App\Core\Auth;
use App\Models\User;

class AuthController extends View {
    private $security;
    protected $session;
    private $auth;
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
        $this->security = new Security($this->db);
        $this->session = Session::getInstance();
        $this->auth = Auth::getInstance();
        parent::__construct();
    }

    public function index() {
        $token = $this->security->generateCsrfToken();
        $data = [
            'token' => $token,
            'session' => $_SESSION
        ];
        
        if ($this->session->hasFlash()) {
            $data['flash'] = $this->session->getFlash();
        }
        
        echo $this->twig->render('front/auth.twig', $data);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /auth');
            exit;
        }

        // Validate CSRF token
        if (!$this->security->validateCsrfToken($_POST['CSRF'] ?? '')) {
            $this->session->setFlash('error', 'Invalid CSRF token');
            header('Location: /auth');
            exit;
        }

        $email = trim(htmlspecialchars($_POST['email']));
        $password = $_POST['password'];
        
        try {
            if ($this->auth->login($email, $password)) {
                header('Location: /author/dashboard');
                exit;
            } else {
                $this->session->setFlash('error', 'Invalid credentials');
                header('Location: /auth');
                exit;
            }
        } catch (\Exception $e) {
            $this->session->setFlash('error', 'An error occurred during login');
            header('Location: /auth');
            exit;
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /auth#register');
            exit;
        }

        // Validate CSRF token
        if (!$this->security->validateCsrfToken($_POST['CSRF'] ?? '')) {
            $this->session->setFlash('error', 'Invalid CSRF token');
            header('Location: /auth#register');
            exit;
        }

        // Sanitize inputs
        $username = trim(htmlspecialchars($_POST['username']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Validate inputs
        if (empty($username) || empty($email) || empty($password)) {
            $this->session->setFlash('error', 'All fields are required');
            header('Location: /auth#register');
            exit;
        }

        try {
            $user = new User(null,$username,$password,null,$email);
            if ($user->register()) {
                $this->session->setFlash('success', 'Registration successful! Please login.');
                header('Location: /auth');
                exit;
            } else {
                $this->session->setFlash('error', 'Registration failed');
                header('Location: /auth#register');
                exit;
            }
        } catch (\Exception $e) {
            $this->session->setFlash('error', 'An error occurred during registration');
            header('Location: /auth#register');
            exit;
        }
    }

    public function logout() {
        $this->auth->logout();
        header('Location: /');
        exit;
    }
}