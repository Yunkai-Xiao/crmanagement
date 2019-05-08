<?php
function makeNull(&$a){
    if ($a == ""){
        $a = null;
    }
}

function generateAndVerifyBarcodeLength($a,$b){
    
    if($a < 10){
        $a = "000000$a";
    }else if($a < 100){
        $a = "00000$a";
    }else if($a < 1000){
        $a = "0000$a";
    }else if($a < 10000){
        $a = "000$a";
    }else if($a < 100000){
        $a = "00$a";
    }else if($a < 1000000){
        $a = "0$a";
    }else if($a < 10000000){
        $a = "$a";
    }
    
    if($b < 10){
        $b = "000000$b";
    }else if($b < 100){
        $b = "00000$b";
    }else if($b < 1000){
        $b = "0000$b";
    }else if($b < 10000){
        $b = "000$b";
    }else if($b < 100000){
        $b = "00$b";
    }else if($b < 1000000){
        $b = "0$b";
    }else if($b < 10000000){
        $b = "$b";
    }
    
    return "$a$b";
    
}

    
    require("../connection.php");

    $invoice_record = str_replace("<br>","",$_GET['count']);
    $account_id = str_replace("<br>","",$_GET['account_id']);
    $type = str_replace("<br>","",$_GET['type']);
    $gender = str_replace("<br>","",$_GET['gender']);
    $color = str_replace("<br>","",$_GET['color']);
    $brand = str_replace("<br>","",$_GET['brand']);
    $piece = str_replace("<br>","",$_GET['piece']);
    $status = str_replace("<br>","",$_GET['status']);
    $ratio = str_replace("<br>","",$_GET['ratio']);
    $size = str_replace("<br>","",$_GET['size']);
    $price = str_replace("<br>","",$_GET['price']);
    $total_same_amount = str_replace("<br>","",$_GET['total_same_amount']);
    $gst = str_replace("<br>","",$_GET['gst']);
    $pst = str_replace("<br>","",$_GET['pst']);
    $max_item_id = str_replace("<br>","",$_GET['max_item_id']);
    
    makeNull($account_id);
    makeNull($type);
    makeNull($gender);
    makeNull($color);
    makeNull($brand);
    makeNull($piece);
    makeNull($status);
    makeNull($ratio);
    makeNull($size);
    makeNull($price);
    makeNull($total_same_amount);
    makeNull($gst);
    makeNull($pst);
    makeNull($max_item_id);

    $tempBarcode = generateAndVerifyBarcodeLength($account_id, $max_item_id);


    $sql = "SELECT * FROM register_item WHERE account_id=$account_id AND max_item_id=$max_item_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo "fail";

    } else {
        date_default_timezone_set('America/Regina');
        $curtime = date("Y-m-d H:i:s");

        $sql = "INSERT INTO register_item (account_id, type, gender, color, brand, piece, status_d_r, ratio, size, price, gst, pst, max_item_id, barcode, sold, sold_amount_record, register_time, invoice_record) VALUES ('$account_id', '$type', '$gender', '$color', '$brand', '$piece', '$status', '$ratio', '$size', '$price', '$gst', '$pst', '$max_item_id', '$tempBarcode', '$total_same_amount', '$total_same_amount', '$curtime', '$invoice_record')";

        if ($conn->query($sql) === TRUE) {
            echo $type."|".$gender."|".$color."|".$brand."|".$piece."|".$status."|".$size."|".$price."|".$tempBarcode;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }


    
    


?>