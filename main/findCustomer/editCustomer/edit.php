<?php
    // Connect to database
    require("../../connection.php");

    // Trim the data
    require('../../php/CleanInput.php');

    // Close the error report
    //require('ErrorReport.php');
    
$notice = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Get the data via post method
    //$name = test_input($_POST['name']);
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);
    $address = test_input($_POST['address']);
    $post_code = test_input($_POST['post_code']);
    $home_phone = test_input($_POST['home_phone']);
    $cell_phone = test_input($_POST['cell_phone']);
    $memo = test_input($_POST['memo']);
    $ratio = test_input($_POST['ratio']);
    
    $sql = "UPDATE account SET first_name='$first_name', last_name='$last_name', email='$email', address='$address', post_code='$post_code', home_phone='$home_phone', cell_phone='$cell_phone', memo='$memo', ratio='$ratio' WHERE id='$id'";        

    if ($conn->query($sql) === TRUE) {
        $notice = "New record created successfully";
    } else {
        $notice = "Worry Edit";
        //echo "Error: " . $sql . "<br>" . $con->error;
    }
    
}
    $conn->close();
?>