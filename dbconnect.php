<?php
$con = new mysqli('localhost','root','','mynewchat');

// Check Connection
if($con->connect_errno){
    echo"Failed to connect to the database: ".$con->connect_error;
    exit();
}




?>