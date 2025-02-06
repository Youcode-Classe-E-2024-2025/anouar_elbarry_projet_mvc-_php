<?php
namespace App\Models;

use App\Core\Model;
use App\Core\Security;
use App\Core\Database;
use Pdo;
use PDOException;

class User extends Model {
    const ADMIN = 'admin';
    const USER = 'user';
    
    private Security $security;
    private Database $database;
    private $id;
    private $username;
    private $password;
    private $role;
    private $email;

    public function __construct(
        Security $security,
        Database $database,
        $id = null,
        $username = null,
        $password = null,
        $role = null,
        $email = null
    ) {
        $this->security = $security;
        $this->database = $database;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        if ($id !== null) {
            $this->id = $id;
        }
    }

    private function isFirstUser(){
        $query = "SELECT COUNT(*) as count FROM users";
            $stmt = $this->security->secureQuery($query);
            if($stmt){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return intval($result['count']) === 0;
            }else{
                return false;
            }
           
    }
    public function register(): int|string {
        $query = "INSERT INTO users (username, email, password, role)
                 VALUES (:username, :email, :password, :role)";
        try {
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            
            $params = [
                "username" => $this->username,
                "email" => $this->email,
                "password" => $hashedPassword,
                "role" => $this->isFirstUser ? self::ADMIN : self::USER
            ];
            
            $stmt = $this->security->secureQuery($query, $params);
            if ($stmt === false) {
                throw new PDOException("Failed to execute query");
            }
            $this->id = $this->database->getConnection()->lastInsertId();
            return (int) $this->id;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function login($hashPassword) {
        $query = "SELECT * FROM users WHERE email = :email";
        try {
            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->execute([
                "email" => $this->email
            ]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($this->password, $hashPassword)) {
                unset($hashPassword); // Don't send password back
                return true;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
}