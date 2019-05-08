<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Make Payment</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" media="screen" href="../../css/searchTableStyle.css" />
<link rel="stylesheet" media="screen" href="../../css/style.css">
    
<link rel="stylesheet" media="print" href="../../css/makePaymentPrint.css">
    
<script type="text/javascript" src="../makePayment/printConsignmentAgreement.js"></script>
<script type="text/javascript" src="checkpaymentRecordShow.js"></script>
    
</head>

<body>
    <div class="wrapper" id="wrapper">
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="" >  
            <h2 class="form-signin-heading">Check Add Item Record(查看添加记录)</h2>
            
            <p> Invoice(记录号):</p>
            <input class="form-control" type="text" id="invoice_number" name="invoice_number" onkeyup="checkPaymentRecordShow(this.value)" required="required" autofocus/><br />
            
            <p id="check_payment"></p>
            <br/>
            <a href="../payment.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="Back(返回)"/></a>
            
        </form>

  </div>
        

    
    
<div id="printtopright" style="margin-left: 50px; ">
    
    <h3>Consigned Items</h3>
    <p>Cozy Cradles & Kid's Wear</p>
    <p>176 University Park Driver</p>
    <p style="margin-bottom: 20px;">Regina SK S4V1A3 3067895422</p>
    
    
    <span id="payment_info"></span>
</div>

    
<table id="targetss" >
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
        
    </tbody>
</table>
    
    <button id="print_payment_agreement" onclick="printDiv()" style="float: right; margin-right: 80px; margin-top: 40px;">Print(Agreement)</button>
    
    
    <div style="float: left; font-size: 10px; margin: 40px">
        <h4>Note:</h4>
        <p>At take-in we inspect items to sell. If any are not accepted. You will be called to pick up. If not picked up within 1 weel. The items will be donated. Prices are estimates & may be discounted. It's the consignors responsibility to claim unsold items within 2 weeks of expiry, or they will be donated. If money is not claimed within 6 months of expiry month. It will be forfeited to the store. If payment under $10, the consignor will receive store credit only.</p>
    </div>
    

<br/>
</body>
</html>