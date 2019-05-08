<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find Customer</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="../css/searchTableStyle.css" />
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/w3.css">
    
<script src="returnItem.js"> </script>
    
</head>

<body>
    <div class="wrapper" id="">
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="" onkeypress="return event.keyCode !=13">
            <h2 class="form-signin-heading">Return Item</h2>
            <p>Barcode(条形码):</p>
            
            <input class="form-control" tupe="text" id="barcode" name="barcode" onkeyup="returnItem(this.value)" />
            
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