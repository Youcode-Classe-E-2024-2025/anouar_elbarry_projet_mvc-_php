<?php
class Security {
    // CSRF Protection
    function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
    
    function validateCsrfToken($token) {
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
    public function secureQuery($conn, $sql, $params = []) {
        try {
            $stmt = $conn->prepare($sql);
            $params = $this->sanitizeInput($params);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log("Query error: " . $e->getMessage());
            return false;
        }
    }
}
