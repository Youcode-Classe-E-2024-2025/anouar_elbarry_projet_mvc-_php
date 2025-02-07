<?php

namespace App\Core;

use App\Models\User;

class Auth {
    private static $instance = null;
    private $session;
    private $user = null;

    private function __construct() {
        $this->session = Session::getInstance();
        
        // Load user if session exists
        if ($this->session->has('user_id')) {
            $user = new User();
            $this->user = $user->getUserById($this->session->get('user_id'));
        }
    }

    public static function getInstance(): Auth {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function login(string $email, string $password): bool {
        $user = new User();
        $authenticatedUser = $user->login($email, $password);
        
        if ($authenticatedUser) {
            $this->user = $authenticatedUser;
            $this->session->set('user_id', $authenticatedUser->getId());
            $this->session->set('username', $authenticatedUser->getUsername());
            $this->session->set('role', $authenticatedUser->getRole());
            return $authenticatedUser->getrole();
        }
        
        return false;
    }

    public function logout(): void {
        $this->user = null;
        $this->session->clear();
    }

    public function isLoggedIn(): bool {
        return $this->user !== null;
    }

    public function getUser() {
        return $this->user;
    }

    public function hasRole(string $role): bool {
        if (!$this->isLoggedIn()) {
            return false;
        }
        return $this->user->getRole() === $role;
    }

    public function requireRole(string $role): void {
        if (!$this->hasRole($role)) {
            header('Location: /auth');
            exit;
        }
    }

    public function requireLogin(): void {
        if (!$this->isLoggedIn()) {
            header('Location: /auth');
            exit;
        }
    }

    public function getUserId(): ?int {
        return $this->isLoggedIn() ? $this->user->getId() : null;
    }

    public function getUsername(): ?string {
        return $this->isLoggedIn() ? $this->user->getUsername() : null;
    }

    public function getRole(): ?string {
        return $this->isLoggedIn() ? $this->user->getRole() : null;
    }
}