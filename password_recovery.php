<?php
session_start();
require 'Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM `tbl_customers` WHERE `EmailAddress` = '$email'";
    $result = mysqli_query($Conn, $sql);

    // Check if the query was successful
    if ($result === false) {
        die("Error in SQL query: " . mysqli_error($Conn));
    }

    // Check the number of rows
    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        // Email exists, generate and send OTP
        $otp = rand(100000, 999999);

        // Save OTP and email to the session for verification later
        $_SESSION['password_recovery_otp'] = $otp;
        $_SESSION['password_recovery_email'] = $email;

        // Send OTP to the user's email (you need to implement email sending here)
        $subject = 'Password Recovery OTP';
        $message = "Your OTP for password recovery is: $otp";
        $headers = 'From: your_email@example.com'; // Replace with your email address

        mail($email, $subject, $message, $headers);

        echo "<script>window.alert('OTP sent to your email.');</script>";
    } else {
        echo "<script>window.alert('Email not found.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head section remains unchanged -->
</head>

<body>

    <!-- Navbar remains unchanged -->

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Password Recovery</h2>
                    <hr>
                </div>

                <div class="col-md-6">
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="email">Enter your email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <button type="submit">Send OTP</button>
                        <a href="Login.php?Role=User">Back to Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer and scripts remain unchanged -->

</body>

</html>
