<?php

require("../connection.php");

// get the q parameter from URL
$id = $_REQUEST["id"];
$payment_amount = $_REQUEST["payment_amount"];

$sql = "SELECT * FROM account WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp = $row["owning"] - $payment_amount;
        $sql = "UPDATE account SET owning='$temp' WHERE id='$id'";
            
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            //echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "Store Credit";
}

//I use this function to floor with decimals:
function floordec($zahl,$decimals=2){    
     return floor($zahl*pow(10,$decimals))/pow(10,$decimals);
}


$conn->close();
?>