<?php

namespace auth;

Use models\User;

require(dirname(dirname(__DIR__))."\\Models\\"."user.php");

class MembershipProvider{

    private $user;

    public function __construct(){

        $this->user = new User();

    }


     // Getters and setters
    public function getUser() {
        return $this->user;
    }    

    public function setUser($user) {
        $this->user = $user;
    }    
   

    public function initUserByUsername($username) {

        $this->user->setUsername($username);

        $this->user = $this->user->readByUsername();

    }

    public function login($username, $password){

        $this->initUserByUsername($username);

        // Validate the password
        if(password_verify($password, $this->user->password)){
            
            session_start();
            $_SESSION['username'] = $this->user->username;

        }

    }

}
