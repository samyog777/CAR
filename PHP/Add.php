<?php
// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: login.html");
    exit();
}

// Check if logout query parameter is set
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../CSS/Add.css">
</head>

<body>
    <?php include 'NavBar.php'; ?>
    <form class="ADDCARS" id="carForm" enctype="multipart/form-data" action="data.php" method="POST">
        <h1>-- Fill The Information To Add Car --</h1>
        <div class="Basic">
            <div class="NAME">
                <div class="Name">
                    <label for="">Brand Name: </label>
                    <input type="text" name="brand_name">
                </div>
                <div class="SubName">
                    <label for="">Sub Name</label>
                    <input type="text" name="sub_name">
                </div>
            </div>
            <div class="Date">
                <label for="">Year of manufacture</label>
                <input type="date" name="manufacture_year">
            </div>
        </div>
        <div class="Exterior">
            <h2>-> Exterior Features</h2>
            <div class="Radios">
                <div class="box">
                    <label for="">Color Choice</label>
                    <select name="color" id="color">
                        <option value="Dimond Blue">Dimond Blue</option>
                        <option value="Dimond Blue">Love Pink</option>
                        <option value="Dimond Blue">Blood Red</option>
                        <option value="Dimond Blue">Ghost Black</option>
                    </select>
                </div>
                <div>
                    <label for="">Wheel Size</label>
                    <select name="Wheel" id="Wheel">
                        <option value="13">13 inch</option>
                        <option value="14">14 inch</option>
                        <option value="15">15 inch</option>
                        <option value="16">16 inch</option>
                        <option value="17">17 inch</option>
                        <option value="18">18 inch</option>
                        <option value="19">19 inch</option>
                        <option value="20">20 inch</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="Engine">
            <h3> -> Performance and Engine</h3>
            <div>
                <label for="">Power:</label>
                <input id="horsepower" name="horsepower" type="text" value="HP">
            </div>
            <div>
                <label for="">Fuel Type</label>
                <select name="fuel_type" id="Fuel">
                    <option value="petrol">Petrol</option>
                    <option value="diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                    <option value="Hydro">Hydro</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label for="">Transmission type</label>
                <select name="Transmission" id="Transmission type">
                    <option value="Automatic">Automatic</option>
                    <option value="manual">manual</option>
                    <option value="CVT">CVT</option>
                </select>
            </div>
        </div>
        <div class="Safety">
            <span id="SaftyHeading"> -> Safety Features</span>
            <div class="Safety1">
                <h2>- Air Bags </h2>
                <label for="">
                    <input type="radio" id="radios" name="Airbags" value="Yes">
                    Yes
                </label>
                <label for="">
                    <input type="radio" id="radios" name="Airbags" value="No">
                    No
                </label>
            </div>
            <div class="Safety2">
                <h2>- Parking sensors </h2>
                <label for="">
                    <input type="radio" name="sensors" value="Yes">
                    Yes
                </label>
                <label for="">
                    <input type="radio" name="sensors" value="No">
                    No
                </label>
            </div>
            <div class="Safety3">
                <h2>- USB ports and auxiliary input </h2>
                <label for="">
                    <input type="radio" name="USB" value="Yes">
                    Yes
                </label>
                <label for="">
                    <input type="radio" name="USB" value="No">
                    No
                </label>
            </div>
        </div>

        <div class="Other">
            <h2>Other Information </h2>
            <textarea name="aboutCar" id="CarArea" cols="90" rows="15"></textarea>
        </div>
        <div>
            <label for="image_url">Image URL:</label>
            <input type="text" name="image_url" id="image_url" required>
        </div>
        <button onclick="navigate('index.php')" type="submit" class="SUBMIT" id="submitButton">Add Car</button>
    </form>
    <script src="script.js"></script>
</body>

</html>