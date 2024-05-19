<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: ../HTML/login.html");
    exit();
}

// Check if logout query parameter is set
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: ../HTML/login.html");
    exit();
}

// Get user's ID from session
$user_id = $_SESSION['user_id'];

// Only fetch user details if user is logged in
if (isset($user_id)) {
    // Retrieve user details from database
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

    // Query to fetch user details
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User details found, fetch and store them
        $row = $result->fetch_assoc();
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $password = $row['password']; // Add this line to retrieve the password
    } else {
        // User not found
        echo "User details not found!";
        exit();
    }

    // Close connection
    $conn->close();
} else {
    // If user ID is not set, redirect to login page
    header("Location: ../HTML/login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Add your CSS stylesheets -->
    <link rel="stylesheet" href="../CSS/Profile.css">
    </link>
</head>

<body>
    <?php include 'NavBar.php'; ?>
    <div class="profile-container">
    <h1>Profile</h1>
    <form action="update_profile.php" method="POST" class="profile-form">
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <a href="reset_password.php" class="password-reset-link">Reset Password</a>
        </div>
        <div class="form-group">
            <input class="btn" type="submit" value="Save Changes">
        </div>
    </form>
    <div class="logout">
        <a href="profile.php?logout=true"><i class="fa-solid fa-sign-out-alt"></i> Logout</a>
    </div>
</div>

    <!-- <script src="script.js"></script> -->
</body>

</html>