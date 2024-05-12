<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if ($password != $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "user_authentication");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully!";
        header("Location: index.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
