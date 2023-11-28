<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'project');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT username, password FROM login_data WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Successful login
            header("Location: home1.html"); // Redirect to home1.html
            exit();
        } else {
            // Invalid credentials
            echo '<script>alert("Invalid username or password.");</script>';
        }

        $stmt->close();
        $conn->close();
    }
}
?>
