<?php

require("../../connection.php");


// get the q parameter from URL
$barcode = $_REQUEST["barcode"];

date_default_timezone_set('America/Regina');
$curtime = date("Y-m-d H:i:s");


$sql = "SELECT max(invoice_record) as lagernumber FROM owning_payment_record"; //find large's number

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $lagernumber = $row["lagernumber"] + 1;
            
/////////////////////////
            
            //update a record
            $sql = "UPDATE sold_item SET paid='$lagernumber', paid_time='$curtime' WHERE barcode='$barcode' AND paid=0";

            if ($conn->query($sql) === TRUE) {
                //echo "Stuff has been update ";
            } else {
                echo "Error updating record: " . $conn->error;
            }
            
            
/////////////////////////          
            
            
        }
    }




$conn->close();

?>