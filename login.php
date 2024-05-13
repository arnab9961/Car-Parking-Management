<?php
session_start();
error_reporting(0);
include('dbconnection.php');

if(isset($_POST['login'])) {
    $adminuser = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($con, "SELECT ID, UserName FROM user_details WHERE UserName='$adminuser' && Password='$password'");
    $ret = mysqli_fetch_array($query);
    if($ret > 0) {
        $_SESSION['vpmsaid'] = $ret['ID'];
        $username = $ret['UserName'];
        header('location:index.php?username=' . urlencode($username)); 
    } else {
        $msg = "Invalid Details.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="icon" type="image/png" href="https://img.icons8.com/windows/32/nCEJ53k3fryj/car.png">
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
                    <h4 class="text-center">LOGIN</h4>
                    <form class="login-form" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" placeholder="Username" required="true" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required="true">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="registration.php" class="btn btn-link">Register</a>
                            <button type="submit" name="login" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <?php if(isset($username)) { ?>
                        <div class="text-center mt-3">Logged in as: <strong><?php echo $username; ?></strong></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>



