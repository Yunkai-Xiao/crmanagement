<?php
require("../connection.php");

require('../php/CleanInput.php');

$notice = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    ////////////////function
    function verifyId($id) {
        if($id < 10){
            $temp = "Account ID: 20000" . $id;
        }else if($id < 100){
            $temp = "Account ID: 2000" . $id;
        }else if($id < 1000){
            $temp = "Account ID: 200" . $id;
        }else if($id < 10000){
            $temp = "Account ID: 20" . $id;
        }
        return $temp;
    }
    

	$first_name = test_input(strtoupper($_POST['first_name']));

	$last_name = test_input(strtoupper($_POST['last_name']));

	$email = test_input($_POST['email']);
    
    $address = test_input($_POST['address']);
    
    $post_code = test_input($_POST['post_code']);
    
    $home_phone = test_input($_POST['cell_phone']);

	$cell_phone = test_input($_POST['cell_phone']);

    $memo = test_input($_POST['memo']);

    $ratio = test_input($_POST['ratio']);

    //insert person info into account
	$sql = "INSERT INTO account (first_name, last_name, email, address, post_code, home_phone, cell_phone, memo, ratio) VALUES ('$first_name', '$last_name', '$email', '$address', '$post_code', '$home_phone', '$cell_phone', '$memo', '$ratio')";

	//echo $sql;

	if ($conn->query($sql) === TRUE) {
        
        $notice = "New record created successfully";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $conn->close();
}

?>