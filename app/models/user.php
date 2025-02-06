<?php
namespace App\Models;
use App\Core\Modal;
class User extends Modal{
    const ADMIN = 'admin';
    const USER = 'user';
    private $id;
    private $username;
    private $password;
    private $role;
    private $email;

    public function __construct($id = null , $username , $password , $role , $email){
         $this->username = $username;
         $this->email = $email;
         $this->password = $password;
         $this->role = $role;
         if($id !== null){
            $this->id = $id;
         }
         
    }
}