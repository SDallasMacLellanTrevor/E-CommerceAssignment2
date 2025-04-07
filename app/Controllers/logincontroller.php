<?php

namespace controllers;

use views\public\Login;

require(dirname(__DIR__)."/resources/views/public/login.php");

class LoginController{

    public function read(){
        
        $data =null;

        (new Login())->render($data);
    
    }    

}
