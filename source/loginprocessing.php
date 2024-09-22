<?php  
session_start();
require('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];


$query = "SELECT * FROM `account` WHERE pemail=? AND password=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result1 = mysqli_stmt_get_result($stmt);
$usercount = mysqli_num_rows($result1);

$query = "SELECT * FROM `admin` WHERE email=? AND password=?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result2 = mysqli_stmt_get_result($stmt);
$admincount = mysqli_num_rows($result2);

if ($usercount == 1) {
    $_SESSION['email'] = $email;
    $url = "myaccount.php";
    header("Location: " . $url);
    exit();
} else if ($admincount == 1) {
    $_SESSION['email'] = $email;
    $url = "adminaccount.php";
    header("Location: " . $url);
    exit();
} else {
    echo '<script>';
    echo 'alert("invalid credential...");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
}
