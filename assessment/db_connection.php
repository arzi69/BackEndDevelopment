<?php
// database connection page for all php files

$servername = "localhost:3306";
$username = "root";
$password = "password";
$dbname = "SchoolDatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) // here we are checking db connection
{
    die("Connection failed: " . $conn->connect_error);
}

?>