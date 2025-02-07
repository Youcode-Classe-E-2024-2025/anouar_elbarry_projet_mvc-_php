<?php

namespace App\Controllers\Front;
use App\Core\Database;
use App\Core\Security;
use App\Core\View;
use App\Models\User;
class AuthController extends View{
    private $security;
    private $user;
    private $db;

    public function __construct($twig){
        $this->db = Database::getInstance()->getConnection();
        $this->security = new Security($this->db);
        parent::__construct($twig);
    }

    public function index() {
        $token = $this->security->generateCsrfToken();
        $data = [
            'token' => $token,
            'session' => $_SESSION
        ];
        
        // Get flash message if exists
        if (isset($_SESSION['flash'])) {
            $data['flash'] = $_SESSION['flash'];
            unset($_SESSION['flash']); // Clear the flash message after use
        }
        
        echo $this->twig->render('front/auth.twig', $data);
     }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die('post method makhdamahc');
            // header('Location: /auth');
            // exit;
        }

        // Validate CSRF token
        if (!$this->security->validateCsrfToken($_POST['CSRF'] ?? '')) {
            $this->setFlash('error', 'Invalid CSRF token');
            die('csrf');
            // header('Location: /register');
            // exit;
        }

        // Sanitize inputs
        $username = trim(htmlspecialchars($_POST['username']));
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        // Validate inputs
        if (empty($username) || empty($email) || empty($password)) {
            $this->setFlash('error', 'All fields are required');
            die('validate input');
            // header('Location: /register');
            // exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->setFlash('error', 'Invalid email format');
            die('filter email');
            // header('Location: /register');
            // exit;
        }

        try {
            // Create user with raw password - hashing is done in User model
            $user = new User(
                null,
                $username,
                $password,  // Pass raw password, not hashed
                null,
                $email
            );

            $userId = $user->register();
            if ($userId) {
                // Automatically log in user
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                $this->setFlash('success', 'Registration successful!');
                header('Location: /author');
                exit;
            }
        } catch (\Exception $e) {
            $this->setFlash('error', 'Registration failed: ' . $e->getMessage());
            die('madazch');
            // header('Location: /register');
            // exit;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /auth');
            exit;
        }

        // Validate CSRF token
        if (!$this->security->validateCsrfToken($_POST['CSRF'] ?? '')) {
            $this->setFlash('error', 'Invalid CSRF token');
            header('Location: /auth');
            exit;
        }

        $email = trim(htmlspecialchars($_POST['email']));
        $password = $_POST['password'];
        
        try {
            $user = new User();
            $authenticatedUser = $user->login($email, $password);
            
            if ($authenticatedUser) {
                $_SESSION['user_id'] = $authenticatedUser->getId();
                $_SESSION['username'] = $authenticatedUser->getUsername();
                $_SESSION['role'] = $authenticatedUser->getRole();
                $_SESSION['email'] = $authenticatedUser->getEmail();

                $this->setFlash('success', 'Login successful!');
                header('Location: /author/dashboard');
                exit;
            }

            $this->setFlash('error', 'Invalid credentials');
            header('Location: /auth');
            exit;

        } catch (\Exception $e) {
            $this->setFlash('error', 'Login failed: ' . $e->getMessage());
            header('Location: /auth');
            exit;
        }
    }

    public function logout()
    {
        // Clear session data
        session_unset();
        session_destroy();
        
        // Regenerate session ID
        session_regenerate_id(true);

        header('Location: /login');
        exit;
    }

    private function setFlash($type, $message)
    {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }
}