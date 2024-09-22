<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $university = $_POST['university'];
    $institute = $_POST['institute'];
    $branch = $_POST['branch'];
    $degree = $_POST['degree'];
    $status = $_POST['rad1'];
    $cpi = $_POST['cpi'];
    $semester = $_POST['semester'];
    $experience = $_POST['experience'];

    $mysqli = new mysqli("localhost", "root", "", "recruitment");

    
    if ($mysqli->connect_error) {
        die("Database Connection Failed: " . $mysqli->connect_error);
    }

 
    $query = "INSERT INTO `academic` (university, institute, branch, degree, status, cpi, semester, experience) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ssssssss", $university, $institute, $branch, $degree, $status, $cpi, $semester, $experience);

    if ($stmt->execute()) {
        $url = "register3.php";
        header("Location: " . $url);
        exit();
    } else {
        echo "Database error: " . $mysqli->error;
    }

    // Close the connection
  
}
?>
