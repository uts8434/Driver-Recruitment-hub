<?php
require('connect.php');

$postname = $_POST['postname'];
$vacancies = $_POST['vacancy'];
$reqexperience = $_POST['reqexperience'];
$minsalary = $_POST['minsalary'];
$maxsalary = $_POST['maxsalary'];

$query = "UPDATE requirement SET vacancies=?, reqexperience=?, minsalary=?, maxsalary=? WHERE postname=?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
  
    mysqli_stmt_bind_param($stmt, "iiiis", $vacancies, $reqexperience, $minsalary, $maxsalary, $postname);
 
   
    if (mysqli_stmt_execute($stmt)) {
        echo '<script>';
        echo 'alert("Successfully updated in the database.");';
        echo 'window.location.href = "updaterequirement.php";';
        echo '</script>';
    } else {
        echo '<script>';
        echo 'alert("Error updating record: ' . mysqli_error($conn) . '");';
        echo '</script>';
    }

  
} else {
    echo '<script>';
    echo 'alert("Error preparing statement: ' . mysqli_error($conn) . '");';
    echo '</script>';
}



?>
