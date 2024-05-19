<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.html");
    exit();
}

// Get user's ID from session
$user_id = $_SESSION['user_id'];

// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

// Update user details in the database
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "user_authentication"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind SQL statement to update user details
$stmt = $conn->prepare("UPDATE users SET firstname=?, lastname=?, email=? WHERE id=?");
$stmt->bind_param("sssi", $firstname, $lastname, $email, $user_id);

// Execute the statement
if ($stmt->execute()) {
    // Redirect back to profile page with success message
    // echo "Successfully changed";
    header("Location: profile.php?message=success");
    exit();
} else {
    // Redirect back to profile page with error message
    echo "Successfully changed";
    header("Location: profile.php?message=error");
    exit();
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
