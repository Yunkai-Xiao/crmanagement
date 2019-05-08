<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Pragma" content="no-cache">
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="../css/registerTableStyle.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<?php

    // Connect to database
    require("../connection.php");
    
    echo "<table><tr><th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Account ID</th>
                    <th>Purpose</th>
                    <th>Date</th>
                    <th>Memo</th></tr>";
    
    for($i = 1; $i <=12; $i++){
        echo "<tr><td style='border:none'></td><td style='color:red'>" . $i . " Month</td></tr>";
        
        $sql = "SELECT * FROM appointment WHERE month=" . $i . " ORDER BY year, month, day";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["account_id"]. "</td><td>" . $row["purpose"]. "</td><td>" . $row["day"]. "/" . $row["month"] . "/" . $row["year"] . "</td><td>"  . $row["memo"]. "</td></tr>";
            }
        } else {
            //echo "0 results";
        }
    }//end for loop
    
        
    echo "</table>";
    
	echo '<a href="appointment.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="Back返回"/></a>';
    
    
    
$conn->close();


?>