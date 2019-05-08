<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];
$pseudoParam = $_REQUEST["pseudoParam"];



$sql = "SELECT * FROM owning_payment_record WHERE invoice_record=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $originalDate = $row["time"];
        $newDate = date("d-m-Y", strtotime($originalDate));
        
        echo "<strong>" . $row["first_name"]. " " . $row["last_name"]. " Account Number: "  . $row["account_id"]. " Total: $" . $row["owning"].  " Date: "  . $newDate. "<br/>Invoice Record Number: " . $row["invoice_record"]. "</strong>";
    }
}




$conn->close();

?>