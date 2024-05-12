<?php
// Create a new PDO instance (change the database credentials accordingly)
$dsn = 'mysql:host=localhost;dbname=HELLO';
$username = 'root';
$password = '';

try {
  $pdo = new PDO($dsn, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Prepare the SQL statement
  $stmt = $pdo->prepare('SELECT * FROM cars');

  // Execute the SQL statement
  $stmt->execute();

  // Fetch all rows from the result set as an associative array
  $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Car Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../CSS/ShowData.css">
</head>

<body>
  <?php foreach ($cars as $car) : ?>
    <ul class="cards">
      <li>
        <div href="" class="card">
          <img src="<?php echo $car['image_url']; ?>" class="card__image" alt="" />
          <div class="card__overlay">
            <div class="card__header">
              <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                <path />
              </svg>
              <img class="card__thumb" src="<?php echo $car['image_url']; ?>" alt="" />
              <div class="card__header-text">
                <h2 class="card__title"><?php echo $car['brand_name']; ?></h2>
                <p class="card__tagline">Sub Name: <?php echo $car['sub_name']; ?></p>
                <p class="card__status">Year: <?php echo $car['manufacture_year']; ?></p>
              </div>
            </div>
            <div class="main">
              <div class="main-first">
                <p class="card__description">Horsepower: <?php echo $car['horsepower']; ?></p>
                <p class="card__description">Airbags: <?php echo $car['airbags']; ?></p>
                <p class="card__description">Sensors: <?php echo $car['sensors']; ?></p>
                <p class="card__description">Wheel Size: <?php echo $car['wheel_size']; ?></p>
              </div>
              <div class="main-second">
                <p class="card__description">Type: <?php echo $car['transmission_type']; ?></p>
                <p class="card__description">Color: <?php echo $car['color']; ?></p>
                <p class="card__description">Fuel Type: <?php echo $car['fuel_type']; ?></p>
                <p class="card__description">USB Ports: <?php echo $car['usb_ports']; ?></p>
              </div>
              <div class="about">
                <p class="card__description" id="About_Car">About Car: <?php echo $car['about_car']; ?></p>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  <?php endforeach; ?>
  <script src="script.js"></script>
</body>

</html>