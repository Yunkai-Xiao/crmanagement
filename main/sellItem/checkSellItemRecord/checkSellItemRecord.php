<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM sold_item WHERE invoice_record=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["type"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["color"]. "</td><td>" . $row["brand"]. "</td><td>" . $row["piece"]. "</td><td>" . $row["status_d_r"]. "</td><td>" . $row["size"]. "</td><td>" . $row["price"]. "</td><td>" . $row["gst"] . "</td><td>" . $row["pst"] . "</td><td>" . $row["barcode"] . "</td><td>" . $row["sale_price"] . "</td><tr>";
    }
} else {
    echo "0 results";
}



$conn->close();

?>