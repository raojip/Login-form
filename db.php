<?php
 $servername='localhost';
 $username='root';
 $password='Patil@123';
 $dbname = "LoginSystem";
 
 $con=mysqli_connect($servername,$username,$password,"$dbname");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>