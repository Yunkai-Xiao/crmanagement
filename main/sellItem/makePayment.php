<?php

require("../connection.php");

// get the q parameter from URL
$payment_method = $_REQUEST["payment_method"];
$payment_amount = $_REQUEST["payment_amount"];



$sql = "INSERT INTO owning_payment (payment_method, amount)
VALUES ('$payment_method', '$payment_amount')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>