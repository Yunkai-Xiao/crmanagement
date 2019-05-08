<?php

require("../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM account WHERE id='$q' OR first_name='$q' OR last_name='$q' OR home_phone='$q' OR cell_phone='$q'";

$result = $conn->query($sql);
if ($result->num_rows>0){
	while($row = $result->fetch_assoc()) {
        $temp = $row["id"];
        echo "ID: " .$temp. 
            "<br/>First Name " . $row["first_name"] . 
            "<br/>Last Name " . $row["last_name"] . 
            "<br/>Email: " . $row["email"]. 
            "<br/>Address: " . $row["address"] . 
            "<br/>Post Code: " . $row["post_code"] . 
            "<br/>Home Phone: " . $row["home_phone"] . 
            "<br/>Cell Phone: " . $row["cell_phone"] . 
            "<br/><font color='red'><a href='makePayment/makePayment.php?id=".$temp."'>Owning: $" . $row["owning"] . 
            "</font></a><br/>Memo: " . $row["memo"] . "<br/><br/>";
    }
} else {
    echo "Cannot Find Customer";
}
$conn->close();

?>