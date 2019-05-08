<?php

    require("../connection.php");
    $account_id = $_GET['account_id'];

    $sql = "SELECT max(invoice_record) as lagernumber FROM register_item";
    $result = $conn->query($sql);

    

    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $invoice_record = $row['lagernumber'] + 1;
    }else{
        $invoice_record = " | ";
    }
    echo $invoice_record;
?>