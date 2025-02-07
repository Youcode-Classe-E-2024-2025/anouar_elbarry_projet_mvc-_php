<?php

namespace App\Core;

class Session {
    private static $instance = null;

    private function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            // Set secure session parameters
            ini_set('session.use_only_cookies', 1);
            ini_set('session.cookie_httponly', 1);
            
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                ini_set('session.cookie_secure', 1);
            }
            
            session_start();
            
            // Regenerate session ID periodically to prevent session fixation
            if (!isset($_SESSION['last_regeneration'])) {
                $this->regenerateSession();
            } else {
                // Regenerate session ID every 30 minutes
                $regeneration_time = 30 * 60;
                if (time() - $_SESSION['last_regeneration'] > $regeneration_time) {
                    $this->regenerateSession();
                }
            }
        }
    }

    public static function getInstance(): Session {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function regenerateSession(): void {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }

    public function set(string $key, $value): void {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public function has(string $key): bool {
        return isset($_SESSION[$key]);
    }

    public function remove(string $key): void {
        unset($_SESSION[$key]);
    }

    public function clear(): void {
        session_unset();
        session_destroy();
    }

    public function setFlash(string $type, string $message): void {
        $_SESSION['flash'] = [
            'type' => $type,
            'message' => $message
        ];
    }

    public function getFlash() {
        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $flash;
        }
        return null;
    }

    public function hasFlash(): bool {
        return isset($_SESSION['flash']);
    }
}