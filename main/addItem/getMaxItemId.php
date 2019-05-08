<?php

require("../connection.php");
$account_id = $_GET['account_id'];
$pseudoParam = $_GET['pseudoParam'];



function checkLength($id, $number){
    if($id < 10){
            $temp = "Account ID: 20000" . $id . "00" . $number;
        }else if($id < 100){
            $temp = "Account ID: 2000" . $id . "00" . $number;
        }else if($id < 1000){
            $temp = "Account ID: 200" . $id . "00" . $number;
        }else if($id < 10000){
            $temp = "Account ID: 20" . $id . "00" . $number;
        }
}

$sql = "SELECT max(max_item_id) as lagernumber, account_id FROM register_item WHERE account_id='$account_id'"; //find large's number

$result = $conn->query($sql);

if ($result->num_rows > 0){
	while($row = $result->fetch_assoc()) {
        echo $row["lagernumber"] + 1;
    }
}
?>