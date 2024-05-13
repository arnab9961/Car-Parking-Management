<?php
session_start();
error_reporting(0);
include('dbconnection_2.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Entrance Form</title>
    <link rel="stylesheet" href="car_en.css">
    <link rel="icon" type="image/png" href="https://img.icons8.com/windows/32/nCEJ53k3fryj/car.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .form-container1 {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    background-color: rgba(255, 255, 255, 0.8); /* Faded background */
}

/* Style the submit button */
.btn-primary {
    background-color: black;
    border-color: black;
}
body {
            background-color: white;
            color: rgb(0, 0, 0);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
</style>
       
</head>

<body>
    <div>
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6">
                <h2 class="text-center font-weight-bold">Car Entrance Form</h2>
                <div class="form-container1">
                    <form method="post" action="car_entrance.php">
                        <div class="form-group">
                            <label for="car_number">Car Number</label>
                            <input class="form-control" type="text" placeholder="Car Number" required="true" name="car_number">
                        </div>
                        <div class="form-group">
                            <label for="owner_name">Owner Name</label>
                            <input class="form-control" type="text" placeholder="Owner Name" required="true" name="owner_name">
                        </div>
                        <div class="form-group">
                            <label for="entry_time">Entry Time</label>
                            <input class="form-control" type="datetime-local" required="true" name="entry_time">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    <?php

include('footer.php');

    ?>
</body>
</html>
