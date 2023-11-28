<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $com_no = $_POST['com-no'];
    $location = $_POST['location'];
    $open_time = $_POST['open-time'];
    $station_id = $_POST['station-id'];
    $close_time = $_POST['close-time'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO pollingstation_form(email, com_no, location, open_time, close_time, station_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssi", $email, $com_no, $location, $open_time, $close_time, $station_id);
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
        echo "<h1>Successful Registration of Your Information System</h1>";
        echo "<p>The Polling Station ID: <span class='highlight'>$station_id</span></p>";
        echo "<p>The polling station located in <span class='highlight'>$location</span></p>";
        echo "<p>The polling station will be open at <span class='highlight'>$open_time</span></p>";
        echo "<p>The polling station will be closed at <span class='highlight'>$close_time</span></p>";
        echo "<p>The polling station is managed by the committee: <span class='highlight'>$com_no</span></p>";
        echo "<p>The committee email: <span class='highlight'>$email</span></p>";
        echo "<div class='button-container'>";
        echo "<a href='home1.html' class='button-home'><button>Home</button></a>"; // Home button
        echo "<a href='pollingstation_form.html'><button>Form</button></a>"; // Form button
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        $stmt->close();
        $conn->close();
    }
}
?>
