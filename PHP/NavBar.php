<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, set $loggedin to false
    $loggedin = false;
} else {
    // If logged in, set $loggedin to true
    $loggedin = true;
}
?>
<div>
    <link rel="stylesheet" href="../CSS/navBar.css">
    <nav class="NavBar">
        <div id="nav1" class="Nav1" onclick="navigate('index.php')">
            <i class="fa-solid fa-car"></i>
            <span>Car</span>
        </div>
        <?php if ($loggedin): ?>
        <div id="nav2" class="Nav2" onclick="navigate('Add.php')">
            <i class="fa-solid fa-plus"></i>
            <span>Add</span>
        </div>
        <?php endif; ?>
        <div id="nav3" class="Nav2" onclick="navigate('profile.php')">
            <i class="fa-solid fa-user"></i>
            <?php
                // Check if user is logged in
                if ($loggedin) {
                    // If user is logged in, show "Profile" with user's first name
                    echo '<span>Profile (' . $_SESSION['firstname'] . ')</span>';
                } else {
                    // If user is not logged in, show "Login"
                    echo '<span>Login</span>';
                }
            ?>
        </div>
        <script src="../JS/script.js"></script>
    </nav>
</div>
