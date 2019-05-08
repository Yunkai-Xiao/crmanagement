<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Item</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" media="screen" href="../css/searchTableStyle.css" />
<link rel="stylesheet" media="screen" href="../css/style.css">
<link rel="stylesheet" media="screen" href="../css/w3.css">
    
<link rel="stylesheet" media="print" href="../css/addItemPrint.css">
   
<script src="showToday.js"> </script>

<script type="text/javascript" src="printConsignmentAgreement.js"></script>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="BrowserPrint-1.0.4.min.js"></script>
<script type="text/javascript" src="DevDemo.js"></script>

<script type="text/javascript">
    $(document).ready(setup_web_print);
</script> 

    
<script src="addItem.js"> </script>

</head>

<body onload="tax_checkbox()">
    <div class="wrapper" id="wrapper">
        
        <!--
        <div id="print_form" style="display:none">
        Enter Name: <input type="text" id="entered_name"></input>
        <br /><br />
        <button type="button" class="btn btn-lg btn-primary" onclick="sendData();" value="Print">Print Label</button>
      </div>  /print_form -->
        
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="" >  
            
            <div id="printer_select" style="display:none">
        Zebra Printer Options<br />
        Printer: <select id="printers"></select>
      </div> <!-- /printer_select -->
            
            <h2 class="form-signin-heading">Item Registration</h2>
            
            <p>Number(数量):</p>
            <input class="form-control" type="text" id="number" name="number" required="required" autofocus/><br />
            <p> Type(种类):</p>
			<input class="form-control" type="text" id="type" name="type"/>
            <p> Gender(性别):</p>
			<input class="form-control" type="text" id="gender1" name="gender1"/>
            <p> Color(颜色):</p>
			<input class="form-control" type="text" id="color1" name="color1"/>
            <p> Brand(品牌):</p>
			<input class="form-control" type="text" id="brand1" name="brand1"/>
            <p> Status(捐赠或退还):</p>
			<input class="form-control" type="text" id="status1" name="Status1"/>
            <p> Size(尺寸):</p>
			<input class="form-control" type="text" id="size1" name="size1"/>
            <p> Price(价格):</p>
			<input class="form-control" type="text" id="price1" name="price1"/>
            
            <p> Guest's first name(名):</p>
            <input class="form-control" tupe="text" id="first_name" name="first_name" onkeyup="getBarcodeId()"/>
            <p> Guest's last name(姓):</p>
            <input class="form-control" tupe="text" id="last_name" name="last_name" onkeyup="getBarcodeId()" />
            <p> Guest's Account ID(账户号码): <input class="form-control" type="text" id="account_id" name="account_id" onkeyup="getName()" required /> </p>
            <p> Max item ID: <input class="form-control" type="text" id="max_item_id" name="max_item_id" readonly/> </p>
            <br/>
            <p> Invoice Number:
                
            <?php
                require("../connection.php");
                $sql = "SELECT max(invoice_record) as lagernumbertemp FROM register_item";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $lagernumber = $row['lagernumbertemp'] + 0;
                        echo '<input class="form-control" type="text" id="invoice_record" name="invoice_record" value='.$lagernumber.' readonly/><br/></p>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close(); 
                
            ?>
                
                
            <input class="form-control" type="hidden" id="invoice_record" name="invoice_record" readonly/> 
            
            <input class="form-control" type="hidden" id="phone" name="phone" readonly/>
            
            <input class="form-control" type="text" id="test" name="test" readonly/>
            
            
            <br/>
            <br/>
            <input class="btn btn-lg btn-primary btn-block" type="button" onclick="createTable()" id="" value="Create Table(创建表格)" />
            <br/>
            <a href="checkAddItemRecord/checkAddItemRecordShow.php"><input class="btn btn-lg btn-primary btn-block" type="button" id="" value="Check Add Item Record(查看添加记录)" /></a>
            <br/>
            <input type="button" class="btn btn-lg btn-primary btn-block" value="Back(返回)" onclick="window.location.href = '../../index.php'"/>
            
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
    <strong><span id="show_name"></span>
    
    <span id="show_phone"></span></strong>
    
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
            <th id="gst_checkbox" class="gst_checkbox">Gst</th>
            <th id="pst_checkbox" class="pst_checkbox">Pst</th>
            <th class="gap">Stock#</th>
        </tr>
    </thead>
    <tbody id="targettbody">
        
    </tbody>
</table>
    
    <button id="print_consignment_agreement" onclick="printDiv();" style="float: right; margin-right: 80px; margin-top: 40px;">Print(Consignment Agreement)</button>
    
    <button onclick="Update()" id="add_print" style="float: right; margin-right: 80px; margin-top: 40px;">Add & Print(Tag)</button>
    
    <div style="float: left; font-size: 10px; margin: 40px">
    <h4>Note:</h4>
    <p>At take-in we inspect items to sell. If any are not accepted. You will be called to pick up. If not picked up within 1 weel. The items will be donated. Prices are estimates & may be discounted. It's the consignors responsibility to claim unsold items within 2 weeks of expiry, or they will be donated. If money is not claimed within 6 months of expiry month. It will be forfeited to the store. If payment under $10, the consignor will receive store credit only.</p>
    </div>
<br/>
</body>
</html>