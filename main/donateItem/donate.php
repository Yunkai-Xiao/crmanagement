<?php

require("../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];
$pseudoParam = $_REQUEST["pseudoParam"];

    $sql = "SELECT * FROM register_item WHERE return_item=1 AND barcode=$q";
    $result = $conn->query($sql);

    $sql0 = "SELECT * FROM register_item WHERE donate_item=1 AND barcode=$q";
    $result0 = $conn->query($sql0);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "1";
    } else if ($result0->num_rows > 0) {
        // output data of each row
        echo "2";
    } else {
        
        $sql = "SELECT * FROM register_item WHERE barcode=$q";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
///////////////////
            //Update the itme status
            date_default_timezone_set('America/Regina');
            $curtime = date("Y-m-d H:i:s");  //current time
            $sql = "UPDATE register_item SET donate_item='1', donate_time='$curtime' WHERE barcode=$q";
            $conn->query($sql);

            if ($conn->query($sql) === TRUE) {
                echo "Donate successfully " . $q;
            } else {
                echo "Error updating record: " . $conn->error;
            }
///////////////////        
        } else {
            echo "No Result";
        }
        
        
        
        
        
    }




$conn->close();

?>