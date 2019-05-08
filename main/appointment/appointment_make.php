<?php
    // Connect to database
    require("../connection.php");

    // Trim the data
    require('../php/CleanInput.php');

    // Close the error report
    //require('ErrorReport.php');

    $notice = "";

    

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Get the data via post method
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $phone_number = test_input($_POST['phone_number']);
    $account_id = test_input($_POST['account_id']);
	$purpose = test_input($_POST['purpose']);
    $appointment_day = test_input($_POST['appointment_day']);
    $appointment_month = test_input($_POST['appointment_month']);
    $appointment_year = test_input($_POST['appointment_year']);
    $memo = test_input($_POST['memo']);
    
    $notice = $appointment_day;
	
	$sql = "INSERT INTO appointment (first_name, last_name, phone, account_id, purpose, day , month, year, memo) VALUES ('$first_name','$last_name','$phone_number','$account_id','$purpose','$appointment_day','$appointment_month','$appointment_year', '$memo')";
	if ($conn->query($sql)){
		$notice = "Success".$first_name;
	}
    
}//end if
    $conn->close();
?>