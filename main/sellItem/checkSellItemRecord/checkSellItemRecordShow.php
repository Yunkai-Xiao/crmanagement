<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sell Item</title>
<link rel='stylesheet prefetch' media="screen" href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" media="screen" href="../../css/searchTableStyle.css" />
<link rel="stylesheet" media="screen" href="../../css/style.css">
<link rel="stylesheet" media="print" href="../../css/sellItemPrint.css">

<script src="checkSellItemRecordShow.js"> </script>


    
</head>
        
<body autocomplete="off">
<div class="wrapper" id="">

    <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="" onkeypress="return event.keyCode !=13" >
        <h2 class="form-signin-heading">Check Sell Item Record(查看销售记录)</h2>
         <p>Invoice(记录号):</p> 
        <input type="text" id="invoice_number" name="invoice_number" class="form-control" onkeyup="checkSellItemRecordShow(this.value)"/>
        
            <br/>
        <a href="../sellItem.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="Back"/></a>
        
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
            <th>Sale Price</th>
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
    
    <p id="trade_record" style="margin-left:60px;"></p>
    
    
    
    <br/>
    <div style="float:right">
        <button style="margin-right:40px" id="payment_receipt" onclick="updateSoldItem()">Payment & Receipt</button> 
        
    </div>
    
    <br/>
    <br/>
    
    
        
        
        
</body>
</html>