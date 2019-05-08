<?php

require("../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM account WHERE id='$q' OR first_name='$q' OR last_name='$q' OR home_phone='$q' OR cell_phone='$q'";

$result = $conn->query($sql);
if ($result->num_rows>0){
	while($row = $result->fetch_assoc()) {
//        echo "ID: " . $row["id"] . 
//            "<br/>First Name " . $row["first_name"] . 
//            "<br/>Last Name " . $row["last_name"] . 
//            "<br/>Email: " . $row["email"]. 
//            "<br/>Address: " . $row["address"] . 
//            "<br/>Post Code: " . $row["post_code"] . 
//            "<br/>Home Phone: " . $row["home_phone"] . 
//            "<br/>Cell Phone: " . $row["cell_phone"] . 
//            "<br/>Owning: $" . $row["owning"] . 
//            "<br/>Memo: " . $row["memo"];
        
        $tempid = $row["id"];
        
        //find unsold Iterm
        $sql = "SELECT * FROM register_item WHERE account_id=$tempid AND sold>0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["type"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["color"]. "</td><td>" . $row["brand"]. "</td><td>" . $row["piece"]. "</td><td>" . $row["status_d_r"]. "</td><td>" . $row["size"]. "</td><td>" . $row["price"]. "</td><td>" . $row["sold"]. "</td><td>" . $row["register_time"]. "</td><td>" . $row["barcode"] . "</td><tr>";
            }
        } else {
            echo "0 results";
        }
        
        //find sold Iterm
//        $sql = "SELECT * FROM register_item WHERE account_id=$tempid AND sold=1";
//        $result = $conn->query($sql);
//
//        if ($result->num_rows > 0) {
//            echo "<p style='color:red'>Sold</p>";
//            // output data of each row
//            while($row = $result->fetch_assoc()) {
//                echo "Account ID: " . $row["account_id"]. "<br/>Type: " . $row["type"]. "<br/>Gender: " . $row["gender"] . $row["color"]. "<br/>Brand: " . $row["brand"]. "<br/>Piece: " . $row["piece"]. "<br/>Status: " . $row["status_d_r"]. "<br/>Size: " . $row["size"]. "<br/>Barcode: " . $row["barcode"]. "<p style='color:red'>Date: " . $row["register_time"]. "</p><br>";
//            }
//        } else {
//            echo "0 results";
//        }
        
    }
} else {
    echo "Cannot Find Customer";
}
$conn->close();

?>