<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $com_no = $_POST['com-no'];
    $chairman = $_POST['chairman'];
    $start_date = $_POST['start-date'];
    $election_id = $_POST['election-id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO electioncommitte_form(email, com_no, chairman, start_date, election_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sissi", $email, $com_no, $chairman, $start_date, $election_id);
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
        echo "<p>The chairman of the election committee is <span class='highlight'>$chairman</span></p>";
        echo "<p>The election committee ID: <span class='highlight'>$com_no</span></p>";
        echo "<p>The election committee email: <span class='highlight'>$email</span></p>";
        echo "<p>The committee was started on <span class='highlight'>$start_date</span></p>";
        echo "<p>The election organized by the committee: <span class='highlight'>$election_id</span></p>";
        echo "<div class='button-container'>";
        echo "<a href='home1.html' class='button-home'><button>Home</button></a>"; // Home button
        echo "<a href='electioncommittee_form.html'><button>Form</button></a>"; // Form button
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        $stmt->close();
        $conn->close();
    }
}
?>
