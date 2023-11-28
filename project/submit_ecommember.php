<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $member_nic = $_POST['member-nic'];
    $member_id = $_POST['member-id'];
    $member_no = $_POST['member-no'];
    $firstName = $_POST['member-firstname'];
    $lastName = $_POST['member-lastname'];
    $com_no = $_POST['com-no'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO committemember_form(member_nic, member_id, member_no, firstName, lastName, com_no) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sisssi", $member_nic, $member_id, $member_no, $firstName, $lastName, $com_no);
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
        echo "<h1>Successful Registration of Member INFO</h1>";
        echo "<p>Thank you, <span class='highlight'>$lastName</span>, for registering.</p>";
        echo "<p>Your Full name: <span class='highlight'>$firstName $lastName</span></p>";
        echo "<p>Your Member ID: <span class='highlight'>$member_id</span></p>";
        echo "<p>Your NIC number: <span class='highlight'>$member_nic</span></p>";
        echo "<p>Your Phone Number: <span class='highlight'>$member_no</span></p>";
        echo "<p>You are currently working in the election committee: <span class='highlight'>$com_no</span></p>";
        echo "<div class='button-container'>";
        echo "<a href='home1.html' class='button-home'><button>Home</button></a>"; // Home button
        echo "<a href='committemember_form.html'><button>Form</button></a>"; // Form button
        echo "</div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";

        $stmt->close();
        $conn->close();
    }
}
?>
