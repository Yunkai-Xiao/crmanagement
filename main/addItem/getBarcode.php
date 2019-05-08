<?php

require("../connection.php");
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];

$sql = "SELECT * FROM account WHERE first_name='$first_name' AND last_name='$last_name'";
$result = $conn->query($sql);
if ($result->num_rows>0){
	$row = $result->fetch_assoc();
	$barcode = $row['id'];
}else{
	$barcode = 0;
}
echo $barcode;
?>