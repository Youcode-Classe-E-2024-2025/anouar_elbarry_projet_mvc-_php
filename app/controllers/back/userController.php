<?php

namespace App\Controllers\Back;
use App\Core\Security;
use App\Core\View;
use App\Models\User;
use App\Models\Article;
use App\Core\Database;

class UserController extends View {
   private $security;
   private $conn;
   private $users;
   private $articles;

   public function __construct() {
       parent::__construct();
       $this->conn = Database::getInstance()->getConnection();
       $this->security = new Security($this->conn); 
       $this->users = new User($this->conn);
       $this->articles = new Article($this->conn);
   }

   public function index() {
       try {
           
           $users = $this->users->getAllUsers();
           
           $data = [
               'users' => $users
           ];
           
           return $this->render('Back/Users.twig', $data);
       } catch (\Exception $e) {
           echo "Error: " . $e->getMessage();
           echo "<br>File: " . $e->getFile();
           echo "<br>Line: " . $e->getLine();
           echo "<br>Trace: <pre>" . $e->getTraceAsString() . "</pre>";
           return null;
       }
   }
}