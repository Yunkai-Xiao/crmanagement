<?php

//ALTER TABLE table AUTO_INCREMENT = 1



//require('ErrorReport.php');

//$servername = "box5403";

//$username = "cmleduco_cozy";

//$password = "cozycradles";

//$dbName = "cmleduco_kidswearinventory";

$servername = "localhost";
//
$username = "root";
//
$password = "";
//
$dbName = "kwi";



$conn = mysqli_connect($servername, $username, $password, $dbName);



if (mysqli_connect_errno()){

    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

//$con1 = mysqli_select_db($con, 'CRManagement');





//echo "Connected successfully";







?>