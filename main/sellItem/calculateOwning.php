<?php

require("../connection.php");

// get the q parameter from URL
$id = $_REQUEST["id"];
$payment_amount = $_REQUEST["payment_amount"];
$barcode = $_REQUEST["barcode"];


//Find the item ratio
$sql = "SELECT * FROM register_item WHERE barcode=$barcode";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp = $row["ratio"];
        
//////////////////////
        
        //I use this function to floor with decimals://///////function/////////
        function floordec($zahl,$decimals=2){    
             return floor($zahl*pow(10,$decimals))/pow(10,$decimals);
        }
/////////time/////////
        date_default_timezone_set('America/Regina');
        $curtime = date("Y-m-d H:i:s");  //current time
        
        $payment_amount = $payment_amount * $temp;
        $payment_amount = floordec($payment_amount,$decimals=2);
   ///////////////////
        
        $sql = "SELECT max(invoice_record) as lagernumber FROM trade_record";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $lagernumber = $row["lagernumber"] + 1;
            
    ////////////////////
                $sql = "INSERT INTO owning_calculation_record (account_id, payment_amount, time, invoice_record) VALUES ('$id', '$payment_amount', '$curtime', '$lagernumber')";

                if ($conn->query($sql) === TRUE) {
                    //echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
    ////////////////////         

            }//end while
        } else {
            echo "0 results";
        }
        
        
        
        
        
   ///////////////////
        //update the account owning in table account
        $sql0 = "SELECT * FROM account WHERE id='$id'";
        $result0 = $conn->query($sql0);

        if ($result0->num_rows > 0) {
            // output data of each row
            while($row = $result0->fetch_assoc()) {
                $temp_owning = $row["owning"] + $payment_amount;
                $sql = "UPDATE account SET owning='$temp_owning' WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    //echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }

            }
        } else {
            //echo "0 results1";
        }

        
        
//////////////////////       
    }
} else {
    echo "0 results2";
}





$conn->close();



?>