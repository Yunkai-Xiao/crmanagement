<?php	

	require ('guestAdd.php') ;
	require("../connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Guest Registration</title>
<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/w3.css">

</head>

<style>



</style>



<body>

    <div class="wrapper" id="">

    <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" >       

          <h2 class="form-signin-heading">Guest Registration</h2>

          <span class="error">* <?php echo "<font color=\"red\"> $notice  </font>";?></span>

          

          <p>First Name(名):</p>

          <input type="text" class="form-control" id="first_name" name="first_name" required autofocus />

          <p>Last Name(姓):</p>

          <input type="text" class="form-control" id="last_name" name="last_name" required />
        
          <p>Email(邮箱):</p>

          <input type="text" class="form-control" id="email" name="email" required />

          <p>Address(地址):</p>

          <input type="text" class="form-control" id="address" name="address"  required />
        
          <p>Post Code(邮编):</p>

          <input type="text" class="form-control" id="post_code" name="post_code" />

          <p>Home Phone(家庭电话):</p>

          <input type="text" class="form-control" id="home_phone" name="home_phone" />
        
          <p>Cell Phone(手机电话):</p>

          <input type="text" class="form-control" id="cell_phone" name="cell_phone" required />
        
         <p>Memo(备注):</p>

          <input type="text" class="form-control" id="memo" name="memo" />
        

          <input type="hidden" class="form-control" id="ratio" name="ratio" value="0.4" readonly/>

          <br />

            <br />

          <input type="submit" value="Submit" class="btn btn-lg btn-primary btn-block" />

          <input type="button" class="btn btn-lg btn-primary btn-block" value="Back" onclick="window.location.href = '../../index.php'"/>



    </form>

  </div>

  

  

</body>

</html>

