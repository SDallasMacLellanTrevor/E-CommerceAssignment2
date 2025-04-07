<?php

namespace views\public;

class Login{

    public function render($data){
        
        $html= '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body>
                    <form action="" method="POST">
                        <label for="fname">Username:</label><br>
                        <input type="text" name="username"><br>
                        <label for="password">Password:</label><br>
                        <input type="password" name="password" ><br><br>
                        <input type="submit" value="Login">
                    </form>
                </body>
                </html>';

        echo $html;        
    }
}

