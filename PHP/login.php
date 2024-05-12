<?php
session_start();
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Connect to MySQL database
    $conn = new mysqli("localhost", "root", "", "user_authentication");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("SELECT id, firstname, lastname, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Verify the password
        if (password_verify($password, $stored_password)) {
            // Start session and store user data
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['email'] = $row['email'];

            // Indicate successful login
            $response['status'] = 'success';
        } else {
            // Indicate invalid password
            $response['status'] = 'error';
            $response['message'] = 'Invalid email or password.';
        }
    } else {
        // Indicate invalid email
        $response['status'] = 'error';
        $response['message'] = 'Invalid email or password.';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
