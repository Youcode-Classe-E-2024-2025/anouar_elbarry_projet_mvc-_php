<?php
namespace App\Core;

use \PDOException;
use \PDOStatement;
class Security {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // CSRF Protection
    public function generateCsrfToken(): string {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    public function validateCsrfToken(string $token): bool {
        if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
            return true;
        }
        return false;
    }

    // Input Sanitization
    public function sanitizeInput($input) {
        if (is_string($input)) {
            return htmlspecialchars(strip_tags(trim($input)));
        }
        
        if (is_array($input)) {
            return array_map([$this, 'sanitizeInput'], $input);
        }
        
        return $input;
    }

    // Secure Database Queries
    public function secureQuery($conn,string $sql, array $params = []): PDOStatement|false {
        try {
            $stmt = $conn->prepare($sql);
            $params = $this->sanitizeInput($params);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query error: " . $e->getMessage());
            // return false;
        }
    }
}
