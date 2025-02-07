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
    private $conn;
    private $id;
    private $username;
    private $password;
    private $role;
    private $email;

    public function __construct(
        $id = null,
        $username = null,
        $password = null,
        $role = null,
        $email = null
    ) {
        $this->setUsername($username);
        $this->setemail($email);
        $this->setpassword($password);
        $this->setrole($role);
        if ($id !== null) {
            $this->setId($id);
        }
        $this->conn = Database::getInstance()->getConnection();
        $this->security = new Security($this->conn);
    }

    private function isFirstUser(){
        $query = "SELECT COUNT(*) as count FROM users";
            $stmt = $this->security->secureQuery($this->conn,$query);
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
            // Hash the password only once, during registration
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            
            $params = [
                "username" => $this->username,
                "email" => $this->email,
                "password" => $hashedPassword,
                "role" => $this->isFirstUser() ? self::ADMIN : self::USER
            ];
            
            $stmt = $this->security->secureQuery($this->conn, $query, $params);
            if ($stmt === false) {
                die('Failed to execute query');
            }
            $this->id = $this->conn->lastInsertId();
            return (int) $this->id;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $param = [
            'email' => $email
        ];
        $stmt = $this->security->secureQuery($this->conn,$query,$param);
        $user = $stmt->fetch();

        // For debugging only - never log actual passwords in production
        $hashedPassword = $user ? $user['password'] : null;

        if (password_verify($password, $hashedPassword)) {
            $this->setId($user['id']);
            $this->setUsername($user['username']);
            $this->setEmail($user['email']);
            $this->setRole($user['role']);
            return $this;
        }

        return false;
    }

    public function getUserById($userId){
        $query = "SELECT * FROM users WHERE id = :userId";
        $param = [
            'userId' => $userId
        ];
        $stmt = $this->security->secureQuery($this->conn,$query,$param);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ? new User(
            $user['id'],
            $user['username'],
            $user['password'],
            $user['role'],
            $user['email']
        ) : null;
    } 

    public function getId(){
       return $this->id;
    }
    public function getUsername(){
       return $this->username;
    }
    public function getemail(){
       return $this->email;
    }
    public function getrole(){
       return $this->role;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUsername($username){
       $this->username = $username;
    }
    public function setemail($email){
        $this->email = $email;
    }
    public function setrole($role){
        $this->role = $role;
    }
    public function setPassword($password): void
    {
        // Store the raw password - it will be hashed during registration
        $this->password = $password;
    }
}