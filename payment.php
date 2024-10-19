<?php
session_start();
require 'Connection.php';

$ProductID = $_GET['ProductID'];
$CustomerID = $_GET['CustomerID'];
$ProductSize = $_POST['ProductSize'];
$DateOrder = date("Y/m/d");

if ($_SESSION['Username'] == null || $_SESSION['Password'] == null) {
    echo "<script>window.open('Login.php?Role=User','_self',null,true); window.alert('Please Login to Process your order');</script>";
    exit();
}

$sql = "INSERT INTO `tbl_orders`(`ProductID`, `CustomerID`, `Size`, `DateOrdered`) " .
       "VALUES ('$ProductID','$CustomerID','$ProductSize','$DateOrder')";
$res = mysqli_query($Conn, $sql);

if (!$res) {
    echo "<script>window.alert('Failed to place order'); window.history.back();</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dummy Payment Form</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" 
	rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" 
	rel="stylesheet" type="text/css">
	<style>
		#pdetails span{
			float: right;
		}
	</style>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Payment Details</h2>
            <form id="dummyPaymentForm" action="dummy_payment_handler.php" method="post">
                <!-- Dummy payment form fields go here -->
                <div class="form-group">
                    <label for="cardNumber">Card Number:</label>
                    <input type="text" id="cardNumber" name="cardNumber" required pattern="\d{16}" title="Enter a valid 16-digit card number">
                </div>

                <div class="form-group">
                    <label for="expiryDate">Expiry Date:</label>
                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YYYY" required pattern="^(0[1-9]|1[0-2])\/20[0-9]{2}$" title="Enter a valid expiry date (MM/YYYY)">
                </div>

                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" required pattern="\d{3}" title="Enter a valid 3-digit CVV">
                </div>

                <button type="button" onclick="submitDummyPayment()">Submit Payment</button>
            </form>
        </div>
    </div>
</div>

<div id="successModal" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ccc;">
    <h3>Booking Successful!</h3>
    <p>Your booking has been confirmed. Thank you!</p>
    <button onclick="closeSuccessModal()">Close</button>
</div>

<script>
function submitDummyPayment() {
    // Dummy payment validation
    var cardNumber = document.getElementById('cardNumber').value;
    var expiryDate = document.getElementById('expiryDate').value;
    var cvv = document.getElementById('cvv').value;

    if (cardNumber.length !== 16 || !/^\d+$/.test(cardNumber)) {
        alert('Enter a valid 16-digit card number');
        return;
    }

    if (!/^(0[1-9]|1[0-2])\/20[0-9]{2}$/.test(expiryDate)) {
        alert('Enter a valid expiry date (MM/YYYY)');
        return;
    }

    if (cvv.length !== 3 || !/^\d+$/.test(cvv)) {
        alert('Enter a valid 3-digit CVV');
        return;
    }

    // Dummy payment processing
    
    
// Display success modal
document.getElementById('successModal').style.display = 'block';
}

function closeSuccessModal() {
// Close the success modal
document.getElementById('successModal').style.display = 'none';

// Redirect or perform further actions as needed
window.location.href = 'index.php'; // Redirect to the home page
}

</script>

</body>
</html>
