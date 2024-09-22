<?php
    require('connect.php');
    require('admin.php');
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
  
		  $query = "INSERT INTO `admin` (email, password) VALUES ('$email', '$password')";
        $result = mysqli_query($conn,$query);
        if($result)
		{
            echo '<script>';
            echo 'alert("admin registered Successfully.");';
            echo 'window.location.href = "adminaccount.php";';
    
            echo '</script>';
			
        }
			else
		{
            echo '<script>';
            echo 'alert("Database error. Its looking like you have already registered an account on this email address");';
            echo 'window.location.href = "admin.php";';
            echo '</script>';
             
			
        }
    }else {
        echo '<script>showMessage("Form fields are missing.");</script>';
}
?>
