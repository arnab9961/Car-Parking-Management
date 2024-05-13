<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Car</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/windows/32/nCEJ53k3fryj/car.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: white;
            color: black;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        form {
            width: 300px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            border-color: black;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: black;
            color: white;
            border: 1px solid black; 
        }
        .btn-primary:hover {
            background-color: #f2f2f2;
            color: black;
            border: 1px solid black;
        }
        table {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Search Car</h2>
        <form method="POST">
            <div class="form-group">
                <label for="car_number">Enter Car Number:</label>
                <input type="text" class="form-control" id="car_number" name="car_number" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_number = $_POST['car_number'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "car_inventory";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn) {
        $stmt = $conn->prepare("SELECT id, car_number, owner_name, entry_time FROM car_entrance WHERE car_number = ?");
        $stmt->bind_param("s", $car_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h3 class='mt-4'>Matching Cars:</h3>";
            echo "<table class='table'>";
            echo "<thead><tr><th>ID</th><th>Car Number</th><th>Owner Name</th><th>Entry Time</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["car_number"]."</td>";
                echo "<td>".$row["owner_name"]."</td>";
                echo "<td>".$row["entry_time"]."</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p class='mt-4'>No cars found with the entered car number.</p>";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<p class='mt-4'>Database connection failed.</p>";
    }
}
?>
    </div>
    <?php
    // Include the footer
    include('footer.php');
    ?>
</body>
</html>
