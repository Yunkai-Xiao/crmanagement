<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Item</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" media="screen" href="../../css/searchTableStyle.css" />
<link rel="stylesheet" media="screen" href="../../css/style.css">
<link rel="stylesheet" media="screen" href="../../css/w3.css">
    
<link rel="stylesheet" media="print" href="../../css/addItemPrint.css">
   
<script src="../showToday.js"> </script>
<script src="checkAddItemRecordShow.js"> </script>
<script type="text/javascript" src="../jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="../BrowserPrint-1.0.4.min.js"></script>
<script type="text/javascript" src="../DevDemo.js"></script>
    
<script type="text/javascript">
    $(document).ready(setup_web_print);
</script> 

</head>

<body>
    <div class="wrapper" id="wrapper">
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="" >  
            <h2 class="form-signin-heading">Check Add Item Record(查看添加记录)</h2>
            
            <p> Invoice(记录号):</p>
            <input class="form-control" type="text" id="invoice_number" name="invoice_number" onkeyup="checkAddItemRecordShow(this.value)" required="required" autofocus/><br />
            
            <input class="form-control" type="text" id="test" name="test"/><br />
            
            <p id="checkAddItem"></p>
            <br/>
            <a href="../addItem.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="Back(返回)"/></a>
            
        </form>

  </div>
        
<div id="target">

</div>
    
<div id="printtopright" style="margin-left: 50px; ">
    
    <h3>Consigned Items</h3>
    <p>Cozy Cradles & Kid's Wear</p>
    <p>176 University Park Driver</p>
    <p style="margin-bottom: 20px;">Regina SK S4V1A3 3067895422</p>
    
    Consign Date:
    <span id="consign_date"></span>
    Due Date:
    <span id="due_date"></span>
    
    Invoice Record Number:
    <span id="invoice_record_number"></span>
    
    <br/>
    
    <span id="show_name"></span>
    Account Number:
    <span id="show_account_id"></span>
    
</div>

    
<table id="targetss" >
	<thead>
    	<tr>
        	<th class="gap">Type<span class="chinese">(种类)</span></th>
            <th class="gap">Gender<span class="chinese">(性别)</span></th>
            <th class="gap">Color<span class="chinese">(颜色)</span></th>
            <th class="gap">Brand<span class="chinese">(品牌)</span></th>
            <th class="gap">Piece<span class="chinese">(件数)</span></th>
            <th class="gap">Disposal(Return/Donate)<span class="chinese">(捐赠或退还)</span></th>
            <th class="gap">Acc %<span class="chinese">百分比</span></th>
            <th class="gap">Size<span class="chinese">(尺寸)</span></th>
            <th class="gap">Sale Price<span class="chinese">(出售价格)</span></th>
            <th class="gap">Total Same Amount<span class="chinese">(相同件数量)</span></th>
            <th class="gap">Stock#</th>
        </tr>
    </thead>
    <tbody id="targettbody">
        
    </tbody>
</table>
    
    <button id="print_consignment_agreement" onclick="printDiv();" style="float: right; margin-right: 80px; margin-top: 40px;">Print(Consignment Agreement)</button>
    
    <button onclick="printTag()" id="add_print" style="float: right; margin-right: 80px; margin-top: 40px;">Print(Tag)</button>
    
    <div style="float: left; font-size: 10px; margin: 40px">
    <h4>Note:</h4>
    <p>At take-in we inspect items to sell. If any are not accepted. You will be called to pick up. If not picked up within 1 weel. The items will be donated. Prices are estimates & may be discounted. It's the consignors responsibility to claim unsold items within 2 weeks of expiry, or they will be donated. If money is not claimed within 6 months of expiry month. It will be forfeited to the store. If payment under $10, the consignor will receive store credit only.</p>
    </div>
<br/>
</body>
</html>