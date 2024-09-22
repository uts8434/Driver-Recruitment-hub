<?php
require('connect.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// View data from the 'personal' table
$sqlPersonal = "SELECT * FROM personal";
$resultPersonal = $conn->query($sqlPersonal);

// View data from the 'account' table
$sqlAccount = "SELECT * FROM account";
$resultAccount = $conn->query($sqlAccount);

// View data from the 'academic' table
$sqlAcademic = "SELECT * FROM academic";
$resultAcademic = $conn->query($sqlAcademic);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #000;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    h2:first-of-type {
        background-color: #007BFF;
        color: #fff;
        padding: 10px;
    }

    table:first-of-type tr:hover {
        background-color: #cce5ff;
    }


    h2:nth-of-type(2) {
        background-color: #28a745;
        color: #fff;
        padding: 10px;
    }

    table:nth-of-type(2) tr:hover {
        background-color: #d4edda;
    }

    /* Academic Data table styles */
    h2:last-of-type {
        background-color: #ffc107;
        color: #000;
        padding: 10px;
    }

    table:last-of-type tr:hover {
        background-color: #fff3cd;
    }
    
table a {
    text-decoration: none;
    padding: 5px 10px;
    margin: 0 5px;
    border: 1px solid #000;
    border-radius: 4px;
    background-color: #007BFF;
    color: #fff;
}

table a:hover {
    background-color: #0056b3;
}

/* Delete link styles */
table a.delete {
    background-color: #dc3545;
}

table a.delete:hover {
    background-color: #c82333;
}
.header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
    }

    .header h1 {
        margin: 0;
        flex: 1; /* Allow the header to take available space */
    }

    .header a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        border-radius: 4px;
    }

    .header a:hover {
        background-color: #0056b3;
    }

    .header form {
        display: flex;
        align-items: center;
    }

    .header input[type="text"] {
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .header input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 4px;
        margin-left: 5px;
        cursor: pointer;
    }

    .header input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>

    <title>Applicant Data</title>
</head>
<body>
<div class="header">
    <h1>Applicant Data</h1>
    <a href="adminaccount.php">Home</a>
    <form method="POST" action="updatedatabase.php">
        <input type="text" name="search" placeholder="Search">
        <input type="submit" name="searchButton" value="Search">
    </form>
</div>
    
    <h2>Personal Data</h2>
    <?php
    if ($resultPersonal->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>First Name</th>';
        echo '<th>Middle Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>Gender</th>';
        echo '<th>Birthdate</th>';
        echo '<th>State</th>';
        echo '<th>City</th>';
       
        echo '</tr>';

        while ($rowPersonal = $resultPersonal->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $rowPersonal["firstname"] . '</td>';
            echo '<td>' . $rowPersonal["middlename"] . '</td>';
            echo '<td>' . $rowPersonal["lastname"] . '</td>';
            echo '<td>' . $rowPersonal["gender"] . '</td>';
            echo '<td>' . $rowPersonal["birthdate"] . '</td>';
            echo '<td>' . $rowPersonal["state"] . '</td>';
            echo '<td>' . $rowPersonal["city"] . '</td>';
           
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No personal records found.";
    }
    ?>
    <!-- deletion code -->

    <h2>Account Data</h2>
    <?php
    if ($resultAccount->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Post</th>';
        echo '<th>Resume</th>';
      
        echo '</tr>';

        while ($rowAccount = $resultAccount->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $rowAccount["post"] . '</td>';
            echo '<td>' . $rowAccount["resume"] . '</td>';
           
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No account records found.";
    }
    ?>

    <h2>Academic Data</h2>
    <?php
    if ($resultAcademic->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>University</th>';
        echo '<th>Institute</th>';
        echo '<th>Branch</th>';
        echo '<th>Degree</th>';
        echo '<th>Status</th>';
        echo '<th>CPI</th>';
        echo '<th>Semester</th>';
        echo '<th>Experience</th>';
    
        echo '</tr>';

        while ($rowAcademic = $resultAcademic->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $rowAcademic["university"] . '</td>';
            echo '<td>' . $rowAcademic["institute"] . '</td>';
            echo '<td>' . $rowAcademic["branch"] . '</td>';
            echo '<td>' . $rowAcademic["degree"] . '</td>';
            echo '<td>' . $rowAcademic["status"] . '</td>';
            echo '<td>' . $rowAcademic["cpi"] . '</td>';
            echo '<td>' . $rowAcademic["semester"] . '</td>';
            echo '<td>' . $rowAcademic["experience"] . '</td>';
          
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No academic records found.";
    }
    ?>

    <?php
    $conn->close();
    ?>
</body>
</html>
