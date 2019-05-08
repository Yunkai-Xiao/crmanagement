<?php
    require("../connection.php");

    date_default_timezone_set('America/Regina');
    $curtime = date("Y-m-d H:i:s");


    $type = str_replace("<br>","",$_GET['type']);
    $gender = str_replace("<br>","",$_GET['gender']);
    $color = str_replace("<br>","",$_GET['color']);
    $brand = str_replace("<br>","",$_GET['brand']);
    $piece = str_replace("<br>","",$_GET['piece']);
    $status_d_r = str_replace("<br>","",$_GET['status_d_r']);
    $size = str_replace("<br>","",$_GET['size']);
    $price = str_replace("<br>","",$_GET['price']);
    $gst = str_replace("<br>","",$_GET['gst']);
    $pst = str_replace("<br>","",$_GET['pst']);
    $barcode = str_replace("<br>","",$_GET['barcode']);
    $sale_price = str_replace("<br>","",$_GET['sale_price']);
    $account_id = str_replace("<br>","",$_GET['account_id']);
    

    $sql = "SELECT max(invoice_record) as lagernumber FROM trade_record";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $lagernumber = $row["lagernumber"] + 1;
            echo $lagernumber;
////////////////////
            $sql = "INSERT INTO sold_item (type, gender, color, brand, piece, status_d_r, size, price, gst, pst, barcode, sale_price, account_id, sold_time, invoice_record) VALUES ('$type', '$gender', '$color', '$brand', '$piece', '$status_d_r', '$size', '$price', '$gst', '$pst', '$barcode', '$sale_price', '$account_id', '$curtime', '$lagernumber')";
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully";
                echo $type."|".$gender."|".$color."|".$brand."|".$piece."|".$status_d_r."|".$size."|".$price."|".$gst."|".$pst."|".$barcode."|".$sale_price."|".$account_id;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                //echo "Failure";
            }

//////////////////   
            
            ////////find the register item and reduce the amount
				$sql0 = "SELECT * FROM register_item WHERE barcode=$barcode";
				$result0 = $conn->query($sql0);

				if ($result0->num_rows > 0) {
					// output data of each row
					while($row = $result0->fetch_assoc()) {
						$temp = $row["sold"];
						if($temp == 0){
							//////////////////
							$temp = 0;
							$sql0 = "UPDATE register_item SET sold='0' WHERE barcode=$barcode";

							if ($conn->query($sql0) === TRUE) {
								//echo "Record updated successfully";
							} else {
								//echo "Error updating record: " . $conn->error;
							}
							//////////////////        
						}else{
							$temp = $temp - 1;
							$sql0 = "UPDATE register_item SET sold='$temp' WHERE barcode=$barcode";

							if ($conn->query($sql0) === TRUE) {
								//echo "Record updated successfully";
							} else {
								//echo "Error updating record: " . $conn->error;
							}
						}
					}
				} else {
					//echo "0 results";
				}
            //////////////////////
            
            
        }//end while
    } else {
        //echo "0 results";
    }



    




    
    



    $conn->close();
?>