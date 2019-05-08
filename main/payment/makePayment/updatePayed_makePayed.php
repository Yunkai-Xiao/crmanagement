<?php

require("../../connection.php");


// get the q parameter from URL
$account_id = $_REQUEST["account_id"];
$first_name = $_REQUEST["first_name"];
$last_name = $_REQUEST["last_name"];
$owning = $_REQUEST["owning"];
$memo = $_REQUEST["memo"];


    
    //find owning
    $sql = "SELECT * FROM account WHERE id=$account_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            
            //update owning
            $temp_owning = $row["owning"] - $owning;
            $sql = "UPDATE account SET owning='$temp_owning' WHERE id=$account_id";
    
            if ($conn->query($sql) === TRUE) {
                //$notice = "New record created successfully";
            } else {
                $notice = "Worry Edit";
                //echo "Error: " . $sql . "<br>" . $con->error;
            }
            
        }
    } else {
        echo "0 results";
    }


    $sql = "SELECT max(invoice_record) as lagernumber FROM owning_payment_record"; //find large's number

    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $lagernumber = $row["lagernumber"] + 1;
            
/////////////////////////
            
        date_default_timezone_set('America/Regina');
        $curtime = date("Y-m-d H:i:s");
            //insert a record
            $sql = "INSERT INTO owning_payment_record (account_id, first_name, last_name , owning, time, memo, invoice_record)
        VALUES ('$account_id', '$first_name', '$last_name', '$owning', '$curtime', '$memo', '$lagernumber')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            
            
/////////////////////////          
            
            
        }
    }


    
    
$conn->close();

?>