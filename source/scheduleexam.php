<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Exam Activities</title>
    <style>
        .register-form {
            width: 500px;
            margin: 0 auto;
            /* text-align: center; */
            padding: 10px;
            color: #fff;
            background: #396;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
        }

        .register-form form input {
            padding: 5px;
        }

        .register-form .btn {
            padding: 5px;
            border-radius: 5px;
            text-decoration: none;
            width: 100px;
            display: inline-block;
            color: #FFF;
            background: #36F
        }

        .register-form .register {
            border: 0;
            width: 110px;
            padding: 8px;
            text-align: center;
            margin-left: 50px;

        }

        hr {
            border-style: double;
            color: beige;
        }
        .reg{
            /* background-color:#36F   ; */
            margin-top: 30px;
            margin-left: 50px;
        }
        .register{
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    width: 100px;
    color: #fff;
    background: #36F;
    text-align: center;
    display: flex;
    margin-top: 10px; 
   
    /* Add margin-right to create space between buttons */
}
    </style>
</head>

<body>
    <div class="register-form">
        <h1 style="text-align:center; color:bisque;">Schedule Exam Activities</h1>
        <hr>
        <div class="reg">
            <form action="scheduleexam.php" method="POST">
                <label for="exam_name">Select post : </label>
                <select id="postname" name="exam_name" required="required" class="formfield3" />

                <option value=""> - - select - -</option>
                <option value="car driver">car Driver</option>
                <option value="taxi driver">Taxi Driver</option>
                <option value="truck driver">Truck driver</option>
                <option value="ambulance driver">Ambulance Driver</option>
                <option value="bus driver">Bus Driver</option>
                <option value="racing driver">Racing Driver</option>
                </select><br><br>

                <label for="exam_date">Exam Date:</label>
                <input type="date" name="exam_date" required><br><br>

                <label for="start_time">Time:</label>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; 
                <input type="time" name="start_time" required><br><br>

                <input type="submit" class="btn register" name="schedule" value="Schedule Exam">
                <input type="submit" class="btn register" name="schedule" value="Home" onclick="window.location.href='adminaccount.php';">
            </form>
        </div>
    </div>
</body>

</html>
<?php

require('connect.php');

if (isset($_POST['schedule'])) {
    $exam_name = $_POST['exam_name'];
    $exam_date = $_POST['exam_date'];
    $start_time = $_POST['start_time'];


    // Insert exam details into the database
    $sql = "INSERT INTO exam_schedule (exam_name, exam_date, start_time) VALUES ('$exam_name', '$exam_date', '$start_time')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Exam scheduled Successfully");';
        echo 'window.location.href = "scheduleexam.php";';
        echo '</script>';
    } else {
        echo "Error scheduling exam activities: " . $conn->error;
    }
}

?>