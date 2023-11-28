<?php
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "project"; // Replace with your database name

// Establish the database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the relevant database
mysqli_select_db($connection, $database);

$selectQuery = "SELECT * FROM committemember_form";

$result = mysqli_query($connection, $selectQuery);

if (!$result) {
    die("Error retrieving data: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #444;
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #444;
            margin: 30px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 5px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ccc;
            text-align: center;
            font-weight: 600;
        }

        th {
            background-color: #444;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
        }

        /* Button Style */
        .btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

<div class="container">
    <h1> Members </h1>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID</th>
            <th>Phone No</th>
            <th>Committe No</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['firstName'] . "</td>";
            echo "<td>" . $row['lastName'] . "</td>";
            echo "<td>" . $row['member_id'] . "</td>";
            echo "<td>" . $row['member_no'] . "</td>";
            echo "<td>" . $row['com_no'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <div style="text-align: center;">
        <button class="btn" onclick="alert('Thanks for viewing the Members!')">Msg</button>
    </div>

</div>

<?php
// Close the database connection
mysqli_close($connection);
?>

</body>
</html>