<?php

namespace views;

/* The view can be written as HTML + PHP
OR we can use OOP and make it a class. 
*/

class EmployeeList{

    public function render($data){
        $html = '
        
        <h1>Create new employee</h1>
        <form action="" method="POST">
        <label for="employeeID">Employee ID:</label><br>
        <input type="text" name="employeeID"><br>
        <label for="firstName">First Name:</label><br>
        <input type="text" name="firstName"><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" name="lastName" ><br>
        <label for="title">Title:</label><br>
        <input type="text" name="title"><br>
        <label for="departmentID">Department ID:</label><br>
        <input type="text" name="departmentID"><br><br>
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
