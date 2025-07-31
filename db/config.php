<?php
//database connection settings
$host = 'localhost';
$db = 'comic_subscription'; //database name
$user = 'root';             //default username for mysql
$pass = '';                 //default password for mysql

//create a new MySQLi connection
$conn = new mysqli($host, $user, $pass, $db);

//check the connection
if($conn->connect_error){
    die("Database connection failed: " . $conn->connect_error);
}

//message for testing
// echo "Database connection established";

?>