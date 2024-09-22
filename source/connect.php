<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recruitment";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}



?>
