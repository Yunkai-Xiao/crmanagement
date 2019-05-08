<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Make Payment</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="../css/searchTableStyle.css" />
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/w3.css">
    
<script src="findPayment.js"> </script>
    
</head>

<body>
    <div class="wrapper" id="">
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="">
            <h2 class="form-signin-heading">Make Payment</h2>
            <p> Guest's first name:</p>
            <input class="form-control" tupe="text" id="first_name" name="first_name" onkeyup="findPayment(this.value)"/>
            
            <p> Guest's last name:</p>
            <input class="form-control" tupe="text" id="last_name" name="last_name" onkeyup="findPayment(this.value)" />
            
            <p>Phone Number:</p>
            <input class="form-control" tupe="text" id="phone_number" name="phone_number" onkeyup="findPayment(this.value)" />
            
            <p> Guest's Account ID: <input class="form-control" type="text" id="account_id" name="account_id" onkeyup="findPayment(this.value)"/> </p>
            
            <p> Invoice Number:
                
            <?php
                require("../connection.php");
                $sql = "SELECT max(invoice_record) as lagernumber FROM register_item";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $lagernumber = $row['lagernumber'] + 0;
                        echo '<input class="form-control" type="text" id="invoice_record" name="invoice_record" value='.$lagernumber.' readonly/><br/></p>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close(); 
                
            ?>
            
            <br/>
            <a href="checkPaymentRecord/checkPaymentRecordShow.php"><input class="btn btn-lg btn-primary btn-block" type="button" id="" value="Check Payment Record(查看付款记录)" /></a>
            
            <br/>
            <input type="button" class="btn btn-lg btn-primary btn-block" value="Back" onclick="window.location.href = '../../index.php'"/>
            
            
            <br/>
            <p id="Customer_info"></p>
        </form>

  </div>
        
<div id="target">

</div>

<br/>
</body>
</html>