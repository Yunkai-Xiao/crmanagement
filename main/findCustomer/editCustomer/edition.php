<?php

    $id = $_REQUEST["id"];

    require('edit.php');
    require('readValue.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Find Customer</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="../css/searchTableStyle.css" />
<link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/w3.css">
    
<script src="findCustomer.js"> </script>
    
</head>

<body>
    <div class="wrapper" id="">
     
        <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="">
            <h2 class="form-signin-heading">Edit Customer</h2>
            
            <span class="error">* <?php echo "<font color=\"red\"> $notice  </font>";?></span>
            
            <p> Guest's Account ID: <input class="form-control" type="text" id="account_id" name="account_id" onkeyup="" value="<?php echo $id;?>" readonly/> </p>
            
            <p> Guest's first name:</p>
            <input class="form-control" tupe="text" id="first_name" name="first_name" onkeyup="" value="<?php echo $first_name;?>"/>
            
            <p> Guest's last name:</p>
            <input class="form-control" tupe="text" id="last_name" name="last_name" onkeyup="" value="<?php echo $last_name;?>"/>
            
            <p>Email:</p>
            <input class="form-control" tupe="text" id="email" name="email" onkeyup="" value="<?php echo $email;?>"/>
            <p>Address:</p>
            <input class="form-control" tupe="text" id="address" name="address" onkeyup="" value="<?php echo $address;?>"/>
            <p>Post Code:</p>
            <input class="form-control" tupe="text" id="post_code" name="post_code" onkeyup="" value="<?php echo $post_code;?>"/>
            
            <p>Home Phone:</p>
            <input class="form-control" tupe="text" id="home_phone" name="home_phone" onkeyup="" value="<?php echo $home_phone;?>"/>
            
            <p>Cell Phone:</p>
            <input class="form-control" tupe="text" id="cell_phone" name="cell_phone" onkeyup="" value="<?php echo $cell_phone;?>"/>
            
            <p>Memo:</p>
            <input class="form-control" tupe="text" id="memo" name="memo" onkeyup="" value="<?php echo $memo;?>"/>
            
            <p>Ratio:</p>
            <input class="form-control" tupe="hidden" id="ratio" name="ratio" onkeyup="" value="<?php echo $ratio;?>"/>
            
            <br/>
            <input type="submit" id="submit" class="btn btn-lg btn-primary btn-block" value="submit"/>
            <br/>
            <input type="button" class="btn btn-lg btn-primary btn-block" value="Back" onclick="window.location.href = '../findCustomer.php'"/>
            <br/>
            <p id="Customer_info"></p>
        </form>

  </div>
        
<div id="target">

</div>

<br/>
</body>
</html>