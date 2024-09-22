<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Include your database connection file
    require('connect.php');

    // Create and execute the query to fetch upcoming events
    $query = "SELECT * FROM upcoming_events";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Fetch upcoming events data
        $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Query failed: " . mysqli_error($conn);
        $events = array(); // Set events to an empty array if there is an error
    }
} else {
    echo "Email not found in the session.";
    $events = array(); // Set events to an empty array if user is not logged in
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Upcoming Events</title>
    <link rel="stylesheet" href="main.css" type="text/css" />
    <style type="text/css">
        /* Your CSS styles for the events list here */
        #apDiv16 {
            position: absolute;
            left: 104px;
            top: 353px;
            width: 162px;
            height: 85px;
            z-index: 2;
            background-color: #008BE8;
            background-position: center center;
            text-align: center;
            vertical-align: middle;
            border-radius: 5px;
        }

        #apDiv16 a {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: 100;
            text-transform: capitalize;
            color: seashell;
            text-decoration: none;
            text-align: center;
            line-height: 1cm;
            background-position: center center;
            float: left;
            padding: 5px;
            -webkit-transition: all 750ms ease-in-out 100ms;
            -moz-transition: all 750ms ease-in-out 100ms;
            -ms-transition: all 750ms ease-in-out 100ms;
            -o-transition: all 750ms ease-in-out 100ms;
            transition: all 750ms ease-in-out 100ms;
            border-radius: 5px;
        }

        #apDiv16 a:hover {
            background: #FFFFB7;
            color: #111;
        }

        #apDiv2 {
            position: absolute;
            left: 354px;
            top: 352px;
            width: 688px;
            height: 384px;
            z-index: 1;
        }

        #apDiv2 table {
            background: #0080C0;
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: lighter;

            color: seashell;
            text-align: center;
            border-width: thin;
            border: #000;
        }


        #apDiv2 table tr td {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: 100;

            color: seashell;
            text-align: center;
        }


        #apDiv6 {
            position: absolute;
            left: 130px;
            top: 258px;
            width: 205px;
            height: 53px;
            z-index: 3;
        }

        #apDiv8 {
            position: absolute;
            left: 1145px;
            top: 257px;
            width: 150px;
            height: 56px;
            z-index: 4;
        }

        #apDiv6 a {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 28px;
            font-weight: 100;
            text-transform: capitalize;
            color: seashell;
            text-decoration: none;
        }

        #apDiv4 {
            position: absolute;
            left: 104px;
            top: 350px;
            width: 162px;
            height: 85px;
            z-index: 2;
            background: #FFFFB7;
            background-position: center center;
            text-align: center;
            vertical-align: middle;
            border-radius: 5px;


        }

        #apDiv4 a {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: 100;
            text-transform: capitalize;
            color: #111;
            text-decoration: none;
            text-align: center;
            line-height: 1cm;
            background-position: center center;
            float: left;
            padding: 5px;
            -webkit-transition: all 750ms ease-in-out 100ms;
            -moz-transition: all 750ms ease-in-out 100ms;
            -ms-transition: all 750ms ease-in-out 100ms;
            -o-transition: all 750ms ease-in-out 100ms;
            transition: all 750ms ease-in-out 100ms;
            border-radius: 5px;
            display: inline-table;
            vertical-align: middle;
        }

        #apDiv8 a {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 28px;
            font-weight: 100;
            text-transform: capitalize;
            color: seashell;
            text-decoration: none;
        }

        #apDiv6 a:hover {
            color: #FFA346
        }

        #apDiv8 a:hover {
            color: #FFA346
        }

        #apDiv9 {
            position: absolute;
            left: 503px;
            top: 257px;
            width: 547px;
            height: 49px;
            z-index: 5;
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 24px;
            font-weight: 100;
            text-transform: none;
            color: seashell;
            text-decoration: none;
        }

        #apDiv40 {
            position: absolute;
            left: 104px;
            top: 450px;
            width: 162px;
            height: 85px;
            z-index: 2;
            /* background:; */
            background-position: center center;
            text-align: center;
            vertical-align: middle;
            border-radius: 5px;
        }

        #apDiv40 a {
            color: seashell;
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: 100;
            text-transform: capitalize;
            background: #008BE8;
            text-decoration: none;
            text-align: center;
            line-height: 1cm;
            background-position: center center;
            float: left;
            padding: 5px;
            -webkit-transition: all 750ms ease-in-out 100ms;
            -moz-transition: all 750ms ease-in-out 100ms;
            -ms-transition: all 750ms ease-in-out 100ms;
            -o-transition: all 750ms ease-in-out 100ms;
            transition: all 750ms ease-in-out 100ms;
            border-radius: 5px;
        }

        #apDiv40 a:hover {
            background: #FFFFB7;
            color: #111
        }

        #apDiv21 {
            position: absolute;
            left: 104px;
            top: 550px;
            width: 162px;
            height: 85px;
            z-index: 2;
            background: #FFFFB7;
            background-position: center center;
            text-align: center;
            vertical-align: middle;
            border-radius: 5px;


        }

        #apDiv21 a {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: 100;
            text-transform: capitalize;
            color: #000;
            text-decoration: none;
            text-align: center;
            line-height: 1cm;
            background-position: center center;
            float: left;
            padding: 5px;
            -webkit-transition: all 750ms ease-in-out 100ms;
            -moz-transition: all 750ms ease-in-out 100ms;
            -ms-transition: all 750ms ease-in-out 100ms;
            -o-transition: all 750ms ease-in-out 100ms;
            transition: all 750ms ease-in-out 100ms;
            border-radius: 5px;
        }

        #apDiv22 {
            position: absolute;
            left: 104px;
            top: 650px;
            width: 162px;
            height: 85px;
            z-index: 2;
            background-color: #008BE8;
            background-position: center center;
            text-align: center;
            vertical-align: middle;
            border-radius: 5px;


        }

        #apDiv22 a {
            font-family: Georgia, "Times New Roman", sans-serif;
            font-size: 20px;
            font-weight: 100;
            text-transform: capitalize;
            color: seashell;
            text-decoration: none;
            text-align: center;
            line-height: 1cm;
            background-position: center center;
            float: left;
            padding: 5px;
            -webkit-transition: all 750ms ease-in-out 100ms;
            -moz-transition: all 750ms ease-in-out 100ms;
            -ms-transition: all 750ms ease-in-out 100ms;
            -o-transition: all 750ms ease-in-out 100ms;
            transition: all 750ms ease-in-out 100ms;
            border-radius: 5px;
        }

        #apDiv22 a:hover {
            background: #FFFFB7;
            color: #111
        }

        #apDiv11 {
            position: absolute;
            left: 190px;
            top: 863px;
            width: 526px;
            height: 123px;
            z-index: 6;
        }

        #event-list {
            border: 3px groove white;
            width: 525px;
            margin: 350px;
            padding: 50px;
            border-radius: 10px;
            color: wheat;
            text-align: left;
        }

        hr {
            border-style: dotted;
            color: #FFA346;
            height: 2px;
            -webkit-text-fill-color: #FFA346;
        }
    </style>
</head>

<body>
    <div id="apDiv1"></div>

    <div id="apDiv6"><a href="myaccount.php">My account</a></div>
    <div id="apDiv8"><a href="logout.php">logout</a></div>
    <div id="apDiv9">User : <?php
                            if (isset($_SESSION['email'])) {
                                $email = $_SESSION['email'];
                                echo  $email;
                            }

                            ?> </div>
    <div id="apDiv4"><a href="upcommingevent.php">upcoming vacancy</a></div>

    <div id="apDiv40"><a href="requirementboard.php">requirement statistics</a></div>
    <div id="apDiv21"><a href="viewprofile.php">my profile details</a></div>
    <div id="apDiv22"><a href="helpandfeedback.php">help and feedback</a></div>

    <div id="apDiv11"></div>

    <div id="event-list">
        <h1 style="color: darkred; text-align: center; ">Upcoming Vacancy</h1>
        <hr>
        <br>
        <div style="max-height: 250px; overflow-y: auto;">
            <ul>
                <?php foreach ($events as $event) : ?>
                    <li>
                        <h2><?php echo "Event Name:  &nbsp; &nbsp;" . $event['event_name']; ?></h2>
                        <p><b>Date: &nbsp; &nbsp;&nbsp; &nbsp;</b> <?php echo $event['event_date']; ?></p>
                        <p><b>Location:</b>&nbsp; &nbsp;&nbsp; &nbsp; <?php echo $event['event_location']; ?></p>
                        <p><b>Description:</b> &nbsp; &nbsp;&nbsp; &nbsp; <?php echo $event['event_description']; ?></p>
                    </li>

                <?php endforeach; ?>
                <li>
                    <?php
                    
                    include 'connect.php'; 

                  
                    $sql = "SELECT * FROM exam_schedule";
                    $result = $conn->query($sql);

                    if ($result->num_rows >= 0) {

                        echo '<h1>Exam Schedule</h1>';


                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                           
                            echo "<b>Exam Name: &nbsp;&nbsp; &nbsp;&nbsp; </b>" . '<td>' . $row['exam_name'] . '</td>' . "<br>";
                            echo "<b>Exam date:&nbsp;&nbsp;</b>" . '<td>' . $row['exam_date'] . '</td>' . "<br>";
                            echo "<b>start time: &nbsp;&nbsp;</b>" . '<td>' . $row['start_time'] . '</td>';

                            echo '</tr>';
                            echo '<br>'.'<br>';
                        }

                        echo '</table>';
                        echo '</body></html>';
                    } else {
                        echo 'No exam details found in the database.';
                    }

                   

                    ?>

                </li>
            </ul>
        </div>
    </div>

    <div id="apDiv11"></div>
</body>

</html>