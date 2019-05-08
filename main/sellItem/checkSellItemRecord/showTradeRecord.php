<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM trade_record WHERE invoice_record=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Subtotal: " . $row["subtotal"]. "<br/>gst: " . $row["gst"]. "<br/>pst: " . $row["pst"]. "<br/>total: " . $row["total"]. "<br/>Store Credit: " . $row["store_credit_account_id"]. "<br/>Store Credit Amount: " . $row["store_credit_account_amount"]. "<br/>paymnet Method: " . $row["payment_method"]. "<br/>Payment Amount: " . $row["payment_method_amount"]. "<br/>Invoice Record " . $row["invoice_record"];
    }
} else {
    echo "0 results";
}



$conn->close();

?>