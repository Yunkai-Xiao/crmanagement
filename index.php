<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRM System</title>

    
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    
<link rel="stylesheet" href="main/css/style.css">
<link rel="stylesheet" href="main/css/w3.css">
    
</head>

<body>


    
<div class="wrapper" id="">

    <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" >       

          <h2 class="form-signin-heading">Main Option</h2>

          <input type="button" onclick="location.href='main/guest/guestAddition.php'" value="Add Guest(添加顾客)" class="btn btn-lg btn-primary btn-block"/>
        <br/>
          <input type="button" onclick="location.href='main/addItem/addItem.php'" value="Add Item(注册商品)" class="btn btn-lg btn-primary btn-block"/>
        <br/>
            <input type="button" onclick="location.href='main/returnItem/returnItem.php'" value="Return Item(下架返还商品)" class="btn btn-lg btn-primary btn-block"/>
        <br/>
            <input type="button" onclick="location.href='main/donateItem/donateItem.php'" value="Donate Item(下架捐赠商品)" class="btn btn-lg btn-primary btn-block"/>
        <br/>
          <input type="button" onclick="location.href='main/sellItem/sellItem.php'" value="Sell Item(出售商品)" class="btn btn-lg btn-primary btn-block"/>
        <br/>
          <a href="main/findCustomer/findCustomer.php" target="_blank"><input type="button" value="Find Customer(寻找顾客)" class="btn btn-lg btn-primary btn-block" /></a>
        <br/>
          <a href="main/unsold/unsoldItem.php" target="_blank"><input type="button" value="Unsold(顾客剩余商品)" class="btn btn-lg btn-primary btn-block" /></a>
        <br/>
          <a href="main/payment/payment.php" target="_blank"><input type="button" value="Payment(付款)" class="btn btn-lg btn-primary btn-block" /></a>
        <br/>
          <input type="button" onclick="location.href='main/appointment/appointment.php'" value="Appointment(预约)" class="btn btn-lg btn-primary btn-block"/>
         

    </form>

  </div>


</body>
</html>