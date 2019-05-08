
<?php

    // Connect to database
    require("../connection.php");
    
    require('../php/CleanInput.php');
    
    
    
    


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['submit'])) {
		// Get the data via post method
		$appointment_month = test_input($_POST['appointment_month']);
        $appointment_year = test_input($_POST['appointment_year']);
        
		if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
///////////////////
        $sql = "SELECT * FROM appointment WHERE year=" .$appointment_year. " AND month=" .$appointment_month. " ORDER BY year, month, day";
        $result = $conn->query($sql);

        echo "<br/><table><tr><th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Account ID</th>
                        <th>Purpose</th>
                        <th>Date</th>
                        <th>Memo</th></tr>";

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["phone"]. "</td><td>" . $row["account_id"]. "</td><td>" . $row["purpose"]. "</td><td>" . $row["day"]. "/" . $row["month"] . "/" . $row["year"] . "</td><td>"  . $row["memo"]. "</td></tr>";
            }
        } else {
            //echo "Hello World";
        }

            echo "</table>";

///////////////////
        

	}
}


$conn->close();


?>