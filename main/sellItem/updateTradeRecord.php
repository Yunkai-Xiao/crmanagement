<?php
    require("../connection.php");
    $subtotal = $_GET['subtotal'];
    $gst = $_GET['gst'];
    $pst = $_GET['pst'];
    $total = $_GET['total'];
    $coupon_method = $_GET['coupon_method'];
    $coupon = $_GET['coupon'];
    $customer_account_id = $_GET['customer_account_id'];
    $store_credit_amount = $_GET['store_credit_amount'];
    $payment_method = $_GET['payment_method'];
    $payment_amount = $_GET['payment_amount'];



    $sql = "SELECT max(invoice_record) as lagernumber FROM trade_record";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $lagernumber = $row["lagernumber"] + 1;
            
////////////////////
            if($subtotal != 0 && $total != 0){
                $sql = "INSERT INTO trade_record (subtotal, gst, pst, total, coupon, coupon_amount, store_credit_account_id, store_credit_account_amount, payment_method, payment_method_amount, invoice_record) VALUES ('$subtotal', '$gst', '$pst', '$total', '$coupon_method', '$coupon', '$customer_account_id', '$store_credit_amount', '$payment_method', '$payment_amount', '$lagernumber')";
                $result = $conn->query($sql);
            }


            if ($result){
                echo $subtotal."|".$gst."|".$pst."|".$total."|".$coupon_method."|".$coupon."|".$customer_account_id."|".$store_credit_amount."|".$payment_method."|".$payment_amount;
            }else{
                echo "Failure";
            }
////////////////////         
            
        }//end while
    } else {
        echo "0 results";
    }





    
?>