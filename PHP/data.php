<?php
// Retrieve the form data
$brandName = $_POST['brand_name'];
$subName = $_POST['sub_name'];
$manufactureYear = $_POST['manufacture_year'];
$color = $_POST['color'];
$wheelSize = $_POST['Wheel'];
$horsepower = $_POST['horsepower'];
$fuelType = $_POST['fuel_type'];
$transmissionType = $_POST['Transmission'];
$airbags = $_POST['Airbags'];
$sensors = $_POST['sensors'];
$usbPorts = $_POST['USB'];
$aboutCar = $_POST['aboutCar'];
$imageUrl = $_POST['image_url'];

// Create a new PDO instance (change the database credentials accordingly)
$dsn = 'mysql:host=localhost;dbname=HELLO';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $pdo->prepare('INSERT INTO cars (brand_name, sub_name, manufacture_year, color, wheel_size, horsepower, fuel_type, transmission_type, airbags, sensors, usb_ports, about_car, image_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

    // Bind the parameters with the form data
    $stmt->bindParam(1, $brandName);
    $stmt->bindParam(2, $subName);
    $stmt->bindParam(3, $manufactureYear);
    $stmt->bindParam(4, $color);
    $stmt->bindParam(5, $wheelSize);
    $stmt->bindParam(6, $horsepower);
    $stmt->bindParam(7, $fuelType);
    $stmt->bindParam(8, $transmissionType);
    $stmt->bindParam(9, $airbags);
    $stmt->bindParam(10, $sensors);
    $stmt->bindParam(11, $usbPorts);
    $stmt->bindParam(12, $aboutCar);
    $stmt->bindParam(13, $imageUrl);

    // Execute the SQL statement
    $stmt->execute();

    // Redirect back to the add.php page
    header('Location: index.php');
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>