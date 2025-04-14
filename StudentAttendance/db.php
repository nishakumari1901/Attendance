<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "attendance_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}

   // echo "Database connected successfully!!";

?>