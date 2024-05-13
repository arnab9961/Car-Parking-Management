<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Animation</title>
    <style>
        /* styles.css */

        .car-animation {
            position: relative;
            width: 30px; /* Adjust the width of the car image */
            height: 30px; /* Adjust the height of the car image */
        }

        .car-animation img {
            position: absolute;
            bottom: 0;
            right: 0; /* Set initial position to bottom right */
            transform: translate(50%, 0); /* Center horizontally */
            animation: moveCar 5s linear forwards;
        }

        @keyframes moveCar {
            0% {
                bottom: 0;
            }
            100% {
                bottom: 100%;
                right: 100%; /* Move the car to top right */
            }
        }
    </style>
</head>
<body>
    <div class="car-animation">
        <img src="toy1.png" alt="Car Image">
    </div>
</body>
</html>
