<?php
require('connect.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user feedback from the "feedback" table
$sqlFeedback = "SELECT user, feedback FROM feedback";
$resultFeedback = mysqli_query($conn, $sqlFeedback);

// Retrieve user feedback from the "help_feedback" table
$sqlHelpFeedback = "SELECT email, subject, content FROM help_feedback";
$resultHelpFeedback = mysqli_query($conn, $sqlHelpFeedback);

if ($resultFeedback && $resultHelpFeedback) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <!-- Add any additional CSS styles here -->
    <style>
        /* Custom CSS styles for the header and button */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        div.header {
            display: flex;
            align-items: center;
            background-color: #3498db;
            padding: 10px 0;
        }

        div {
            flex: 1;
            margin: 0;
            color: white;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            background-color: #3498db;
        }

        input[type="button"]  {
            width: auto;
            height: 40px;
            padding: 7px;
            text-align: center;
            border-radius: 17px;
            background-color: blanchedalmond;
            font-weight: bold;
            color: red;
            margin-right: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background-color: white;
            margin: 20px auto;
            border: 2px solid #3498db;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td {
            color: #333;
        }

        th, td {
            font-size: 14px;
        }
    </style>
</head>
<body>
        <div style="display: flex;">
        <div>User Feedback</div>

        <input type="button" name="" id="" value="Home"  onclick="window.location.href='adminaccount.php';" >
        </div>
    <!-- Display the user feedback in an HTML table -->
    <table>
        <tr>
            <th>User</th>
            <th>subject</th>
            <th>feedback</th>
        </tr>
        <?php
        $p="not applicable";
        // Loop through the "feedback" table results and display each feedback entry
        while ($row = mysqli_fetch_assoc($resultFeedback)) {
            echo "<tr>";
            echo "<td>" . $row['user'] . "</td>";
            echo "<td>".$p."</td>";
            echo "<td>" . $row['feedback'] . "</td>";
            echo "</tr>";
        }

        // Loop through the "help_feedback" table results and display each feedback entry
        while ($row = mysqli_fetch_assoc($resultHelpFeedback)) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['subject'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
} else {
    echo "Query error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
