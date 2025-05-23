<?php

namespace views;

/* The view can be written as HTML + PHP
OR we can use OOP and make it a class. 
*/

use core\http\RequestBuilder;
use Controllers\EmployeeController;
require_once("core\\http\\requestbuilder.php");



class EmployeeList{

    public function render($data){
        
        function validateInput($data) {
            // Trim whitespace from the beginning and end of the input
            $data = trim($data);
            // Remove backslashes from the input
            $data = stripslashes($data);
            // Convert special characters to HTML entities
            $data = htmlspecialchars($data);

            $data = preg_match('/^[A-Za-z\- ]+$/', $data);

            return $data;
        }

        $requestBuilder = new RequestBuilder();
        $request = $requestBuilder->getRequest();

        if($request->getMethod() == 'POST'){
            $controller = new EmployeeController;
            
            if (
                validateInput($_POST["firstName"]) != null &&
                validateInput($_POST["lastName"]) != null &&
                validateInput($_POST["title"]) != null
            ) {
                $params = [$_POST["firstName"], $_POST["lastName"], $_POST["title"]];

                $controller->createEmployee($params);
            }
        }

        $html = '
        
        <h1>Create new employee</h1>
        <form action="" method="POST">
        <label for="firstName">First Name:</label><br>
        <input type="text" name="firstName"><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" name="lastName" ><br>
        <label for="title">Title:</label><br>
        <input type="text" name="title"><br><br>
        <input type="submit" value="Login">
    </form>


        <table>
            <thead>
                <tr>
                    <th>EmployeeID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Position</th>
                </tr>
        </thead>';

            foreach ($data as $employee) {
                $html .= "<tr>";
                $html .= "<td>{$employee["employeeID"]}</td>";
                $html .= "<td>{$employee["firstName"]}</td>";
                $html .= "<td>{$employee["lastName"]}</td>";
                $html .= "<td>{$employee["title"]}</td>";
                $html .= "</tr>";
            }
        $html .="</table>";
      
        echo $html;  
    }
}
