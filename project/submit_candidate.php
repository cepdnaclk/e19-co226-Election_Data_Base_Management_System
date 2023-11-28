<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $candidate_party = $_POST['candidate-party'];
    $candidate_age = $_POST['candidate-age'];
    $party_id = $_POST['party-id'];
    $firstName = $_POST['candidate-firstname'];
    $lastName = $_POST['candidate-lastname'];
    $candidate_id = $_POST['candidate-id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO candidate_form(firstName, lastName, candidate_id, party_id, candidate_age, candidate_party) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiiis", $firstName, $lastName, $candidate_id, $party_id, $candidate_age, $candidate_party);
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
        echo "<h1>Successful Registration of Candidate INFO</h1>";
        echo "<p>Thank you for registering <span class='highlight'>$firstName $lastName</span></p>";
        echo "<p>Your Candidate ID: <span class='highlight'>$candidate_id</span></p>";
        echo "<p>Your Age: <span class='highlight'>$candidate_age</span></p>";
        echo "<p>You belong to the political party <span class='highlight'>$candidate_party</span> with the party ID <span class='highlight'>$party_id</span></p>";
        echo "<div class='button-container'>";
        echo "<a href='home1.html'><button class='button'>Home</button></a>"; // Home button
        echo "&nbsp;&nbsp;";
        echo "<a href='candidate_form.html'><button class='button'>Form</button></a>"; // Form button
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        $stmt->close();
        $conn->close();
    }
}
?>
