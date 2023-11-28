<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $election_id = $_POST['election-id'];
    $vote_count = $_POST['vote-count'];
    $won = $_POST['won'];
    $location = $_POST['location'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO election_result(election_id, vote_count, won, location) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $election_id, $vote_count, $won, $location);
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
        echo "    display: flex;";
        echo "    justify-content: space-between;";
        echo "    margin-top: 20px;";
        echo "}";
        echo ".button-container a button {";
        echo "    padding: 10px 20px;";
        echo "    background-color: #4CAF50;";
        echo "    color: white;";
        echo "    border: none;";
        echo "    border-radius: 4px;";
        echo "    cursor: pointer;";
        echo "}";
        echo ".button-container a.button-home {";
        echo "    background-color: #f44336;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='border'>";
        echo "<h1>Successful Registration of Election Count</h1>";
        echo "<p>The Election ID: <span class='highlight'>$election_id</span></p>";
        echo "<p><span class='highlight'>$won</span> won the election in <span class='highlight'>$location</span> with a vote count of <span class='highlight'>$vote_count</span></p>";
        echo "<div class='button-container'>";
        echo "<a href='home1.html' class='button-home'><button>Home</button></a>"; // Home button
        echo "<a href='election_result.html'><button>Result</button></a>"; // Result button
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        $stmt->close();
        $conn->close();
    }
}
?>
