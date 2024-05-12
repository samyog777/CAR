<?php
session_start();

if(isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    // Get user's ID from session
    $user_id = $_SESSION['user_id'];

    // Retrieve user details from the database
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "user_authentication"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to fetch user details
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User details found, fetch and store them
        $row = $result->fetch_assoc();
        $hashed_old_password = $row['password'];
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Verify if old password matches
        if(password_verify($old_password, $hashed_old_password)) {
            // Check if new password and confirm password match
            if($new_password === $confirm_password) {
                // Hash the new password
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the password in the database
                $update_sql = "UPDATE users SET password = '$hashed_new_password' WHERE id = $user_id";
                if ($conn->query($update_sql) === TRUE) {
                    // Password updated successfully
                    header("Location: profile.php?password_reset=success");
                    exit();
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            } else {
                // New password and confirm password do not match
                header("Location: reset_password.php?error=password_mismatch");
                exit();
            }
        } else {
            // Old password is incorrect
            header("Location: reset_password.php?error=incorrect_old_password");
            exit();
        }
    } else {
        // User not found
        header("Location: reset_password.php?error=user_not_found");
        exit();
    }

    // Close connection
    $conn->close();
} else {
    // Redirect to reset password page if form fields are not set
    header("Location: reset_password.php");
    exit();
}
?>
