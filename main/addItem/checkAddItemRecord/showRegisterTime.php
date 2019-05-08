<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM register_item WHERE invoice_record=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo $row["register_time"];
    
} else {
    echo "0 results";
}



$conn->close();

?>