<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_number = $_POST["car_number"];
    $owner_name = $_POST["owner_name"];
    $entry_time = $_POST["entry_time"];

    $sql = "INSERT INTO car_entrance (car_number, owner_name, entry_time) VALUES ('$car_number', '$owner_name', '$entry_time')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or the homepage
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
