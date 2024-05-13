<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['vpmsaid'])) {
    header('location:login.php'); // Redirect to the login page
    exit(); // Stop further execution of the script
}
$username = isset($_GET['username']) ? urldecode($_GET['username']) : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Parking Booking</title>
    <link rel="stylesheet" href="style.css">
    
    <link rel="icon" type="image/png" href="https://img.icons8.com/windows/32/nCEJ53k3fryj/car.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="grid-container">
    <div class="grid-item1">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <a href="car_entrance.php">Car entrance</a>
            <a href="search_car.php">Search Car</a>
            <a href="display_cars.php">Display cars</a>
            <div class="user-profile">
                <i class="bi bi-person-circle"></i>
                <span><?php echo $username; ?></span>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>
    
    <div class="grid-item2">
        <?php include('header.php'); ?>
        <h1>Car Parking Booking System</h1>
        <p>Reserve your parking spot now!</p>
        <button class="btn">Book Now</button>
        <img src="car2.jpeg" alt="Car Image" style="max-width: 110%;">
    </div>
</div>

<div class="container">
    <h2><i class="bi bi-geo-alt-fill"></i>The locations we are available</h2>
    <!-- Embed Google Map using an iframe -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d28788.175861298427!2d90.42399340643463!3d23.75649320188699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sbd!4v1715029476507!5m2!1sen!2sbd" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
    
<?php include('footer.php'); ?>

<!-- User icon and logout button -->

</body>
</html>
