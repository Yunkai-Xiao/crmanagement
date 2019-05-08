<?php
    require('appointment_make.php');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Pragma" content="no-cache">
  
  
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="../css/registerTableStyle.css">
    <link rel="stylesheet" href="../css/style.css">
	<script src="appointment.js"> </script>
</head>

<body>
    <div class="wrapper" id="">
        
    <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" >  
    
      <br/>
      <h2 class="form-signin-heading">Appointmetn Center</h2>
        <span class="error">* <?php echo "<font color=\"red\"> $notice  </font>";?></span>
        
        <p> Guest's first name名:</p>
        <input class="form-control" type="text" id="first_name" name="first_name" onkeyup="getBarcodeId()"/>
        <p> Guest's last name姓:</p>
        <input class="form-control" type="text" id="last_name" name="last_name" onkeyup="getBarcodeId()" />
        <p>Phone Number电话:</p>
        <input class="form-control" type="text" id="phone_number" name="phone_number" onkeyup="getBarcodeId(this.value)" />
        <p> Guest's Account ID账户号码: <input class="form-control" type="text" id="account_id" name="account_id" onkeyup="findCustomer(this.value)"/> </p>
        <br/>
        <p> Purpose: </p>
        <select id="purpose" name="purpose" class="btn btn-lg btn-primary btn-block">
          <option value="Cheque">Cheque支票</option>
          <option value="Drop off">Drop Off送货</option>
          <option value="Drop Off & Cheque">Drop Off & Cheque送货和支票</option>
        </select>
        <br/>
        <p>Day日:</p>
        <select id="appointment_day" name="appointment_day" class="btn btn-lg btn-primary btn-block">
            <?php
                for($i = 1; $i <= 31; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <p>Month月:</p>
        <select id="appointment_month" name="appointment_month" class="btn btn-lg btn-primary btn-block">
          <?php
                for($i = 1; $i <= 12; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <p>Year年:</p>
        <select id="appointment_year" name="appointment_year" class="btn btn-lg btn-primary btn-block">
          <?php
                for($i = 2018; $i <= 2040; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        
        <br/>
        <p> Memo备注: <input class="form-control" type="text" id="memo" name="memo" onkeyup=""/> </p>
        <br/>
      
        
        <br/>
      <input type="submit" id="Login" class="btn btn-lg btn-primary btn-block" value="Submit确认"/>
      <input type="button" class="btn btn-lg btn-primary btn-block" value="Back返回" onclick="window.location.href = '../../index.php'"/>
        <br/>
      <a href="view_all_appointment.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="View All Appointments查看所有预约"/></a>
        <br/>
      <a href="search.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="View Appointments查看指定月份预约"/></a>
    </form>
        
<?php

   //require('show.php');
      
?>
        
  </div>
  
  
</body>
</html>
