<?php
session_start();
error_reporting(0);

include('dbconnection.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        
        // Prepare and execute SQL query to insert data into the database
        $query = "INSERT INTO user_details (email, username, password) VALUES ('$email', '$username', '$password')";
        $result = mysqli_query($con, $query);

        // Check if the query was successful
        if($result) {
            // Registration successful, set success message in session variable
            $_SESSION['success_message'] = "Registration successful! You can now login.";

            // Redirect to login page
            header('location: login.php');
            exit; // Stop further execution of the script
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Center the form horizontally and vertically */
        .form-container {
            max-width: 400px;
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
        .cursive-title {
            font-family: 'Lucida Handwriting', cursive;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-md-6">
                <h2 class="text-center font-weight-bold cursive-title">Car parking management system</h2>
                <div class="form-container">
                    <h4 class="text-center">Registration</h4>
                    <form class="login-form" method="post">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input class="form-control" type="email" placeholder="Email" required="true" name="email">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                        </div>  
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="true">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
