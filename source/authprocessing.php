
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fsubmit"])) {
    $email = $_POST["fpemail"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($newPassword === $confirmPassword) {
       
        require('connect.php');

        if ($conn === false) {
            die("Error: Database connection failed.");
        }

        $query = "SELECT * FROM account WHERE pemail = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result === false) {
            die("Error in the SQL query: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
        
            $updateQuery = "UPDATE account SET password = '$newPassword' WHERE pemail = '$email'";
            if (mysqli_query($conn, $updateQuery)) {
                echo '<script>';
                echo 'alert(" Updated scuccessfully");';
                echo 'window.location.href = "login.php";';
                echo '</script>';;
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {
            echo "Email not found in the database.";
        }

        mysqli_close($conn);
    } else {
        echo "Passwords do not match. Please try again.";
    }
}
?>
<?php

