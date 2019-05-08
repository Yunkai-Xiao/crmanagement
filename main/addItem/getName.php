<?php

    require("../connection.php");
    $account_id = $_GET['account_id'];

    $sql = "SELECT * FROM account WHERE id='$account_id'";
    $result = $conn->query($sql);

    

    if ($result->num_rows>0){
        $row = $result->fetch_assoc();
        $name = $row['first_name']."|".$row['last_name'];
    }else{
        $name = " | ";
    }
    echo $name;
?>