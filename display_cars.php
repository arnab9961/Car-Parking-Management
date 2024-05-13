<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Cars</title>
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
            margin-top: 20px;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="table-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "car_inventory";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Check if the script is accessed via a GET request
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $sql = "SELECT id, car_number, owner_name, entry_time FROM car_entrance";
                $result = $conn->query($sql);

                if ($result === false) {
                    trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                }

                echo "<h2>All Cars</h2>";

                if ($result->num_rows > 0) {
                    echo "<table class='table'>";
                    echo "<thead><tr><th>ID</th><th>Car Number</th><th>Owner Name</th><th>Entry Time</th></tr></thead>";
                    echo "<tbody>";
                    // Display the car information in a table
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
                    // Display a message if no cars are found
                    echo "<p>No cars found in the inventory.</p>";
                }
            }

            $conn->close();
            ?>
        </div>
    </div>
    <?php
    // Include the footer
    include('footer.php');
    ?>
</body>
</html>
