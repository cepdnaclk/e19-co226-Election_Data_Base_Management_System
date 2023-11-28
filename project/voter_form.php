<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voter_id = $_POST['voter-id'];
    $voter_dob = $_POST['voter-dob'];
    $voter_age = $_POST['voter-age'];
    $firstName = $_POST['voter-firstname'];
    $lastName = $_POST['voter-lastname'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal-code'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO voter_form(firstName, lastName, voter_id, voter_dob, voter_age, street, city, state, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisissss", $firstName, $lastName, $voter_id, $voter_dob, $voter_age, $street, $city, $state, $postal_code);
        $execval = $stmt->execute();

        // Styling variables
        $backgroundColor = "#f2f2f2";
        $headingColor = "#333";
        $textColor = "#666";

        // Output HTML
        echo "<html>";
        echo "<head>";
        echo "<title>Information System</title>";
        echo "<style>";
        echo ".border {";
        echo "    border: 3px solid black;";
        echo "    padding: 20px;";
        echo "    background-color: $backgroundColor;";
        echo "}";
        echo "h1, p {";
        echo "    color: $headingColor;";
        echo "}";
        echo ".highlight {";
        echo "    font-weight: bold;";
        echo "    color: $textColor;";
        echo "}";
        echo ".button-container {";
        echo "    margin-top: 20px;";
        echo "}";
        echo ".button {";
        echo "    display: inline-block;";
        echo "    padding: 10px 20px;";
        echo "    background-color: #4CAF50;";
        echo "    color: white;";
        echo "    text-decoration: none;";
        echo "    border: none;";
        echo "    border-radius: 4px;";
        echo "    cursor: pointer;";
        echo "    font-size: 16px;";
        echo "    margin-right: 10px;";
        echo "    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);";
        echo "}";
        echo ".button:hover {";
        echo "    background-color: #45a049;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='border'>";
        echo "<h1>Successful Registration of Voter INFO...</h1>";
        echo "<p>Thank you, <span class='highlight'>$lastName</span>, for your registration.</p>";
        echo "<p>Voter Full Name: <span class='highlight'>$firstName $lastName</span></p>";
        echo "<p>$firstName $lastName was born on <span class='highlight'>$voter_dob</span> and is currently <span class='highlight'>$voter_age</span> years old</p>";
        echo "<p><span class='highlight'>$lastName</span>, your voter ID is <span class='highlight'>$voter_id</span></p>";
        echo "<br>Your Address:</br>";
        echo "<ul>";
        echo "<li><span class='highlight'>$firstName $lastName</span></li>";
        echo "<li><span class='highlight'>$street</span>,</li>";
        echo "<li><span class='highlight'>$city</span>,</li>";
        echo "<li><span class='highlight'>$state</span>.</li>";
        echo "<li><span class='highlight'>$postal_code</span></li>";
        echo "</ul>";
        echo "<br>";
        echo "<div class='button-container'>";
        echo "<a href='home1.html'><button class='button'>Home</button></a>"; // Home button
        echo "&nbsp;&nbsp;";
        echo "<a href='voter_form.html'><button class='button'>Form</button></a>"; // Form button
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        $stmt->close();
        $conn->close();
    }
}
?>
