<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Pragma" content="no-cache">
  
  
    <link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="../css/registerTableStyle.css">
    <link rel="stylesheet" href="../css/style.css">
	<script src="appointment.js"> </script>
    <script type="text/javascript">
	
	
	</script>
</head>

<body>
    <div class="wrapper" id="">
        
    <form class="form-signin" id="myForm" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" >  
    
      <br/>
      <h2 class="form-signin-heading">Appointmetn Center</h2>
        
        
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
                for($o = 2018; $o <= 2040; $o++){
                    echo '<option value="'.$o.'">'.$o.'</option>';
                }
            ?>
        </select>
      
        
        <br/>
        
        <input type="submit" id="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="View Appointments查看预约(选择月份)"/>
      <a href="appointment.php"><input type="button" class="btn btn-lg btn-primary btn-block" value="Back返回"/></a>
      
    </form>
        
<?php
    require("view_special_appointment.php");
?>
        
  </div>
  
  
</body>
</html>
