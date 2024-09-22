<?php

require('connect.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (
        isset($_POST['event_name']) &&
        isset($_POST['event_date']) &&
        isset($_POST['event_location']) &&
        isset($_POST['event_description'])
    ) {
        // Sanitize user inputs (consider using prepared statements for better security)
        $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
        $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
        $event_location = mysqli_real_escape_string($conn, $_POST['event_location']);
        $event_description = mysqli_real_escape_string($conn, $_POST['event_description']);

        // SQL query to insert data into the upcoming_events table
        $query = "INSERT INTO upcoming_events (event_name, event_date, event_location, event_description)
                  VALUES ('$event_name', '$event_date', '$event_location', '$event_description')";

        if (mysqli_query($conn, $query)) {
            echo '<script>';
            echo 'alert(" Sucessfully inserted data into database");';
            echo 'window.location.href = "adminevent.php";';
            echo '</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Form fields are not set or empty.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Upcoming Event</title>
    <style>
        .event-form {
            width: 500px;
            height: 500px;
            margin: 0 auto;
            /* text-align: center; */
            padding: 10px;
            color: #fff;
            background: #396;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
        }

        .event-form form input textarea {
            padding: 5px;
        }

        .event-form .btn {
            padding: 5px;
            border-radius: 5px;
            text-decoration: none;
            width: 100px;
            display: inline-block;
            color: #FFF;
            background: #36F
        }

        .event-form .register {
            border: 0;
            width: 90px;
            padding: 8px;
        }



        #event_description {
            width: 300px;
        }

        #btnn {
            text-align: center;
        }

        .btnn1 {
            margin-right: 110px;

        }

        label {
            display: block;
            
            margin-bottom: 5px;
            
            font-weight: bold;
            
        }


        textarea {
            width: 100%;
           
            padding: 5px;
           
            border: 3px solid #ccc;
            border-radius: 5px;
         
        }

        .form-container {
            display: grid;
            grid-template-columns: 1fr;
           
            margin-left: 90px;
        }

        hr {
            border-style: double;
        }
    </style>

</head>

<body style="background-color:light-blue;">
    <div class="event-form">
        <h2 style="text-align:center;">Add Upcoming Event</h2>
        <hr>
        <div class="form-container">
            <form action="adminevent.php" method="post">
                <label for="event_name">Post :&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <select id="postname" name="event_name" required="required" class="formfield3" />

                <option value=""> - - select - -</option>
                <option value="car driver">car Driver</option>
                <option value="taxi driver">Taxi Driver</option>
                <option value="truck driver">Truck driver</option>
                <option value="ambulance driver">Ambulance Driver</option>
                <option value="bus driver">Bus Driver</option>
                <option value="racing driver">Racing Driver</option>
                </select><br><br>

                <label for="event_date"> Date:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="date" id="event_date" name="event_date"><br><br>

                <label for="event_location">Location:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="event_location" name="event_location" placeholder="Event Location" required><br><br>

                <label for="event_description">Description:&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <textarea id="event_description" name="event_description" rows="4" cols="50" placeholder="vacancy Description"></textarea><br><br>
                <br><br>
                <div id="btnn">
                    <input type="submit" class="btnn1 btn register" value="Add Event">
                    <input type="submit" class="btnn1 btn register" value="Home" onclick="window.location.href='adminaccount.php';">

                </div>
            </form>
        </div>
        <p style="text-align:center;color:white ; font-family:Verdana, Geneva, Tahoma, sans-serif;">designed by Utsav Kumar singh</p>
    </div>

</body>

</html>