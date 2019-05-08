<?php

    require("../../connection.php");

    

    $sql = "SELECT * FROM account WHERE id=".$id;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $address = $row['address'];
            $post_code = $row['post_code'];
            $home_phone = $row['home_phone'];
            $cell_phone = $row['cell_phone'];
            $memo = $row['memo'];
            $ratio = $row['ratio'];
        }
    } else {
        echo "0 results";
    }

?>