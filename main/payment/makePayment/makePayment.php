<?php

    $id = $_REQUEST["id"];

    require('readAccountValue.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Make Payment</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" media="screen" href="../../css/searchTableStyle.css" />
<link rel="stylesheet" media="screen" href="../../css/style.css">
    
<link rel="stylesheet" media="print" href="../../css/makePaymentPrint.css">
    
<script type="text/javascript" src="printConsignmentAgreement.js"></script>
<script type="text/javascript" src="updatePayed.js"></script>
    
</head>

<body>
    <div class="wrapper" id="wrapper">
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="">
            <h2 class="form-signin-heading">Make Payment</h2>
            <!--
            <span class="error">* <?php echo "<font color=\"red\"> $notice  </font>";?></span>
            -->
            <p> Guest's Account ID: <input class="form-control" type="text" id="account_id" name="account_id" onkeyup="" value="<?php echo $id;?>" readonly/> </p>
            
            <p> Guest's first name:</p>
            <input class="form-control" tupe="text" id="first_name" name="first_name" onkeyup="" value="<?php echo $first_name;?>" readonly/>
            
            <p> Guest's last name:</p>
            <input class="form-control" tupe="text" id="last_name" name="last_name" onkeyup="" value="<?php echo $last_name;?>" readonly/>
            
            <p> Owning:$</p>
            <input class="form-control" tupe="text" id="owning" name="owning" onkeyup="" value="<?php echo $owning;?>" readonly/>
            
            
            <input class="form-control" type="hidden" id="memo" name="memo" onkeyup="" value="<?php echo $memo;?>"/>
            
            <!--
            <br/>
            <input type="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="Make Payment"/>
-->
            
            
            <br/>
            <input type="button" class="btn btn-lg btn-primary btn-block" value="Back" onclick="window.location.href = '../Payment.php'"/>
            <br/>
            <p id="Customer_info"></p>
        </form>

  </div>
        

    
    
<div id="printtopright" style="margin-left: 50px; ">
    
    <h3>Consigned Items</h3>
    <p>Cozy Cradles & Kid's Wear</p>
    <p>176 University Park Driver</p>
    <p style="margin-bottom: 20px;">Regina SK S4V1A3 3067895422</p>
    
    <h5><?php echo $first_name." ".$last_name . " Account Number: " . $id; ?>
    <?php 
        date_default_timezone_set('America/Regina');
        $curtime = date("Y-m-d");  //current time
        
        echo "Total: $" . $owning . " Date: " . $curtime;
        ?></h5>
    
    
    
        
    <?php
        require("../../connection.php");
        
        $sql = "SELECT max(invoice_record) as lagernumber FROM owning_payment_record";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $lagernumber = $row["lagernumber"];
                echo '<strong>Invoice Record Number:<span id="invoice_record_number">'." ".$lagernumber." ".'</span></strong>';
            }
        }
        
    ?>
        
    
</div>

    
<table id="targetss" style="margin-right: 100px;">
	<thead>
    	<tr>
        	<th class="gap1">Type</th>
            <th class="gap1">Gender</th>
            <th class="gap1">Color</th>
            <th class="gap1">Brand</th>
            <th class="gap1">Piece</th>
            <th class="gap1">Disposal</th>
            <th class="gap1">Size</th>
            <th class="gap1">Distribute</th>
            <th class="gap1">Stock #</th>
        </tr>
    </thead>
    <tbody id="targettbody">
        <?php
            
            require("readSoldItem.php");
        
        ?>
    </tbody>
</table>
    
    <button id="print_payment_agreement" onclick="printDiv()" style="float: right; margin-right: 80px; margin-top: 40px;">Print(Agreement)</button>
    
    <button onclick="updatePayed()" id="add_print" style="float: right; margin-right: 80px; margin-top: 40px;">Make Payment</button>
    
    <div style="float: left; font-size: 10px; margin: 40px">
        <h4>Note:</h4>
        <p>At take-in we inspect items to sell. If any are not accepted. You will be called to pick up. If not picked up within 1 weel. The items will be donated. Prices are estimates & may be discounted. It's the consignors responsibility to claim unsold items within 2 weeks of expiry, or they will be donated. If money is not claimed within 6 months of expiry month. It will be forfeited to the store. If payment under $10, the consignor will receive store credit only.</p>
    </div>
    

<br/>
</body>
</html>