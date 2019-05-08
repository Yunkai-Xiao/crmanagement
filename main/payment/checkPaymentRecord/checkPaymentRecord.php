<?php

require("../../connection.php");


// get the q parameter from URL
$q = $_REQUEST["q"];


/////////function/////////
    function floordec($zahl,$decimals=2){    
        return floor($zahl*pow(10,$decimals))/pow(10,$decimals);
    }
/////////function/////////

$sql = "SELECT * FROM sold_item WHERE paid=$q";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp_barcode = $row["barcode"];
        echo "<tr><td>" . $row["type"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["color"]. "</td><td>" . $row["brand"]. "</td><td>" . $row["piece"]. "</td><td>" . $row["status_d_r"]. "</td><td>" . $row["size"]. "</td>";
        
/////////////////////
            $sql0 = "SELECT * FROM sold_item WHERE barcode='$temp_barcode'";
            
            $result0 = $conn->query($sql0);

            if ($result0->num_rows > 0) {
                // output data of each row
                $row = $result0->fetch_assoc();
                $temp_sale_price = $row['sale_price'];
                
                ////////////////////
                $sql1 = "SELECT * FROM register_item WHERE barcode='$temp_barcode'";
                $result1 = $conn->query($sql1);

                if ($result1->num_rows > 0) {
                    // output data of each row
                    $row1 = $result1->fetch_assoc();
                    $temp_ratio = $row1['ratio'];
                    $temp_distribution = $temp_ratio * $temp_sale_price;
                    $temp_distribution = floordec($temp_distribution,$decimals=2);
                    
                    echo "<td>".$temp_distribution."</td>";
                    
                } else {
                    echo "0 results";
                }
                ////////////////////           
                
                
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
            }
/////////////////////   
         echo "<td>" . $row["barcode"] . "</td><tr>";
    }
} else {
    echo "0 results";
}



$conn->close();

?>