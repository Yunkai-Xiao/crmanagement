<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM register_item WHERE invoice_record=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["type"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["color"]. "</td><td>" . $row["brand"]. "</td><td>" . $row["piece"]. "</td><td>" . $row["status_d_r"]. "</td><td>" . $row["ratio"]. "</td><td>" . $row["size"]. "</td><td>" . $row["price"] . "</td><td>" . $row["sold_amount_record"] . "</td><td>" . $row["barcode"] . "</td><tr>";
    }
} else {
    echo "0 results";
}



$conn->close();

?>