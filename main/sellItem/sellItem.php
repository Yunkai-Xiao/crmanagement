<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sell Item</title>
<link rel='stylesheet prefetch' media="screen" href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" media="screen" href="../css/searchTableStyle.css" />
<link rel="stylesheet" media="screen" href="../css/style.css">
<link rel="stylesheet" media="print" href="../css/sellItemPrint.css">

<script src="sellItem.js"></script>
<script src="sellItem_mySalefunction.js"></script>
<script src="sellItem_myDeleteFunction.js"></script>
<script src="findPrice.js"></script>
<script src="applyCoupon.js"></script> 
<script src="findOwning.js"></script> 
<script src="paymentMethod.js"></script> 
<script src="calculateOwning.js"></script> 
<script src="storeCreditUsing.js"></script>

<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="WebPrint-master/webprint.js"></script>
<script src="printer.js"></script> 

	
<script src="updateSoldItem.js"></script> 
    
</head>
        
<body autocomplete="off">
<div class="wrapper" id="">

    <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="" onkeypress="return event.keyCode !=13" >
        <h2 class="form-signin-heading">Sell Item</h2>
		
		Printers: <select id="printerlist"></select>
		<br/>
		<br/>
        <button class="btn btn-lg btn-primary btn-block" onclick="webprint.requestPrinters();">Refresh</button><br/>
		
		
         <p>Barcode(条形码):</p> 
        <input type="text" id="barcode" name="barcode" class="form-control" onkeyup="getInfo(event.keyCode)"/>
        
        <p> Invoice Number:
                
            <?php
                require("../connection.php");
                $sql = "SELECT max(invoice_record) as lagernumber FROM sold_item";
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
        
        <input type="hidden" id="counter" name="counter" class="form-control" value=0 readonly/> 
            <br/>
        <a href="checkSellItemRecord/checkSellItemRecordShow.php"><input class="btn btn-lg btn-primary btn-block" type="button" id="" value="Check Sell Item Record(查看出售记录)" /></a>
            <br/>
        <input type="button" class="btn btn-lg btn-primary btn-block" value="Back" onclick="window.location.href = '../../index.php'"/>
        
        <input class="form-control"  type="hidden" id="test" name="test" value="" required/>
        
    </form>

  </div>
<!-- ----------print---------- -->
<hr>
    <h4 style='text-align:center; font-weight:bold; margin-top:-10px;'>
    <span style='font-style:italic' >Cozy Cradles & Kid's Wear</span>
    <br/>
    </h4>
     <p style='text-align:center; text-size:10px; margin-top:0px;'>176 University Park Drive</p>
    <br/>
    <p style='text-align:center; text-size:10px; margin-top:-20px;'>Regina, SK</p>
    <br/>
    <p style='text-align:center; text-size:10px; margin-top:-20px; padding-botton:-20px;'>306-789-5422</p>
<hr/>
<!-- ----------print---------- -->
    
Amount:<input type="number" id="amount" name="amount" value=0 readonly autocomplete="off" />    
<table id="targetss">
	<thead>
    	<tr>
        	<th>Type</th>
            <th>Gender</th>
            <th>Color</th>
            <th>Brand</th>
            <th>Piece</th>
            <th>Disposal</th>
            <th>Size</th>
            <th>Price</th>
            <th>Gst</th>
            <th>Pst</th>
            <th>Barcode</th>
            <th>Discount</th>
            <th>Sale Price</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody id="targettbody">
    	
        
    </tbody>
</table>
    
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    
    Subtotal:$<input type="text" id="subtotal" name="subtotal" value="" required/>
    Gst:$<input type="text" id="gst" name="gst" value="" required/>
    Pst:$<input type="text" id="pst" name="pst" value="" required/>
    Total:$<input type="text" id="total" name="total" value="" required/>
    <button onclick="findPrice()">Check Out</button>
    <br/>
    <br/>
    <br/>
    <select id="coupon_method">
      <option value="1">amount</option>
      <option value="2">Percentage(Off)</option>
    </select>
    $
    <input type="text" id="coupon" value="" />
    <button onclick="applyCoupon()">Apply Coupon</button>
    <br/>
    <br/>
    
    <p>Store Credit:
    <select id="store_credit_method" onchange="" required>
      <option value="6" selected>Store Credit</option>
    </select>
    Account ID:
    <input type="text" id="customer_account_id" onkeyup="findOwning(this.value)" value="" /><span id="">Account Amount: $<input type="text" id="store_credit_amount" value="0"/></span><a href="../findCustomer/findCustomer.php" target="_blank" style="color:red">Find Customer ID</a></p>
    
    
    
    <br/>
    <p>Payment Method:
    <select id="payment_method" onchange="paymentMethod()" required>
      <option value="">None</option>
      <option value="1">MC</option>
      <option value="2">Visa</option>
      <option value="3">Bank Card</option>
      <option value="4">Cash</option>
      <option value="5">AE</option>
    </select>
    <span id="payment_method_notice" style="color:red"></span>
    <input type="text" id="payment_amount" onkeyup="cashMethod()" value="" /><span id="change"></span></p>
    <br/>
    <div style="float:right">
        <button style="margin-right:40px" id="payment_receipt" onclick="updateSoldItem()">Payment & Receipt</button> 
        
    </div>
    
    <br/>
    <br/>
    
    
        <input id="cutter" type="checkbox" checked="checked"/><br/>
        <input id="image" type="checkbox" checked="checked"/>
        
        
</body>
</html>