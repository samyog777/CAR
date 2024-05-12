<?php
// Start the session
session_start();


// Get user's first name from session
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "User";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .CARS_Collection {
        margin-top: 5em;
        display: flex;
        align-items: center;
        justify-content: start;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .BODY {
        margin-top: 4em;
        text-align: center;
    }
</style>

<body>
<?php include 'NavBar.php'; ?>

    <h1 class="BODY">Welcome, <?php echo $firstname; ?></h1>
    <div class="CARS_Collection">
        <?php
        // Only include show_car.php if user is logged in
        include 'show_car.php';
        ?>
    </div>
    <!-- <script src="script.js"></script> -->
    <script>
        function logout() {
            // Redirect to index.php with logout query parameter
            window.location.href = 'index.php?logout=true';
        }
    </script>
</body>

</html>
