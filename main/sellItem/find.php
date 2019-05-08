<?php
	require("../connection.php");
	$q = $_REQUEST["q"];
	
	$sql1 = "SELECT * FROM register_item WHERE barcode='$q'";
	$result1 = $conn->query($sql1);
	
    $sql = "SELECT * FROM register_item WHERE return_item=1 AND barcode=$q";
    $result = $conn->query($sql);

    $sql0 = "SELECT * FROM register_item WHERE donate_item=1 AND barcode=$q";
    $result0 = $conn->query($sql0);

    $sql2 = "SELECT * FROM register_item WHERE sold=0 AND barcode=$q";
    $result2 = $conn->query($sql2);

    

    if ($result->num_rows > 0) {
        // output data of each row
        echo "1";
    } else if ($result0->num_rows > 0) {
        // output data of each row
        echo "2";
    }else if ($result2->num_rows > 0) {
        // output data of each row
        echo "3";
    }else if ($result1->num_rows>0){
		$row = $result1->fetch_assoc();
		echo $row['type']."|".$row['gender']."|".$row['color']."|".$row['brand']."|".$row['piece']."|".$row['status_d_r']."|".$row['size']."|".$row['price']."|".$row['gst']."|".$row['pst']."|".$row['barcode']."|".$row['sold'];
	}else{
		echo "Error";
	}
?>