<?php  


session_start();
if (isset($_SESSION['email'])){
$email = $_SESSION['email'];
}
 require('connect.php');
 $query = "SELECT * FROM account WHERE account.pemail='$email'";
	
	$result=mysqli_query($conn,$query);
	
	    $row=mysqli_fetch_array($result);
	
		  $userid = $row['userid'];
		   $user = $row['pemail'];
		
		  $feedback=$_POST['feedback'];

 
  
		$query = "INSERT INTO `feedback` (userid,user,feedback) VALUES ('$userid', '$user', '$feedback')";
        $result = mysqli_query($conn,$query);
        if($result){
	
        echo '<script>';
    echo 'alert("Successfully submitted feedback.");';
    echo 'window.location.href = "feedback.php";';
    echo '</script>';
			
        }
		else
		{
			echo'Database error';
		}
		
  
	
    ?>