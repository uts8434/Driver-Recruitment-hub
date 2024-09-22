<?php
session_start();

// Check if the form is submitted
if (isset($_POST['asubmit'])) {
    // Get user's email from the session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];

        // Get form data
        $subject = $_POST['helpsubject'];
        $content = $_POST['helpcontent'];

        // Database connection
        require('connect.php');

        // Insert feedback into the database
        $query = "INSERT INTO help_feedback (email, subject, content) VALUES ('$email', '$subject', '$content')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo '<script>';
            echo 'alert("Successfully submitted feedback.");';
            echo 'window.location.href = "feedback.php";';
            echo '</script>';                 
        } else {
            echo 'Database error';
        }
    } else {
        echo 'User not logged in';
    }
}
?>
