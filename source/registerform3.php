<?php
require('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post = $_POST['post'];
    $resume = $_POST['resume'];
    $pemail = $_POST['pemail'];
    $semail = $_POST['semail'];
    $password = $_POST['setpassword'];

    $mysqli = new mysqli("localhost", "root", "", "recruitment");

    
    if ($mysqli->connect_error) {
        die("Database Connection Failed: " . $mysqli->connect_error);
    }

  
    $query = "INSERT INTO `account` (post, resume, pemail, semail, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssss", $post, $resume, $pemail, $semail, $password);

    if ($stmt->execute()) {
        $url = "finish.php";
        header("Location: " . $url);
        exit();
    } else {
        $msg = "Database error. It's possible that you have already registered an account with this email address or there is some other issue. Please verify that you have not registered an account with the mentioned primary or secondary email address.";
        echo $msg;
        echo "<br><br>";
        echo "TIP: Verify that you have not registered any account on the mentioned primary or secondary email address.";
        echo "<br><br>";
        echo "<a href='login.php'>Go Back To Login</a>";
    }

  
}
?>
