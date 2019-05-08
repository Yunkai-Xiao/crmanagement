<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM register_item WHERE invoice_record=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()){ 
    $account_id = $row["account_id"];
    }
///////////////////
    
    $sql = "SELECT * FROM account WHERE id=$account_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["first_name"]. " " . $row["last_name"];
        }
    } else {
        echo "0 results";
    }
  
///////////////////
} else {
    echo "0 results";
}



$conn->close();

?>