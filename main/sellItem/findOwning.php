<?php

require("../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];

$sql = "SELECT * FROM account WHERE id='$q'";

$result = $conn->query($sql);
if ($result->num_rows>0){
	while($row = $result->fetch_assoc()) {
        echo $row["owning"];
    }
} else {
    echo "0";
}
$conn->close();

?>