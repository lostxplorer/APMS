<?php

include 'DBConnect.php';
// get form data
$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_email = $_POST['user_email'];
$shop_id = $_POST['shop_id'];


$services = $_POST['services'];

// insert new appointment into database
$sql = "INSERT INTO appointment (user_name, user_phone, user_email, shop_id) VALUES ('$user_name', '$user_phone', '$user_email', '$shop_id')";
if (mysqli_query($conn, $sql)) {
	echo "Appointment created successfully";
} else {
	echo "Error creating appointment: " . mysqli_error($conn);
}

// send email notification to user
// $to = $user_email;
// $subject = "Appointment Created";
// $message = "Your appointment at shop $shop_id has been created.";
// $headers = "From: your_email@example.com";

// mail($to, $subject, $message, $headers);

// close database connection
mysqli_close($conn);
?>


            <?php 
            include 'DBConnect.php';

            $sql = "SELECT service,time_taken FROM services WHERE shop_id = '$shop_id'";
            // display services as a table with checkbox inputs
            $result = mysqli_query($conn, $sql);

            // display services as a table with checkbox inputs
            echo "<table>";
            echo "<tr><th>Service</th><th>Time Taken</th><th>Select</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['service'] . "</td>";
                echo "<td>" . $row['time_taken'] . "</td>";
                echo "<td><input type='checkbox' name='services[]' value='" . $row['service_id']. "'></td>";
                echo "</tr>";
            }
            echo "</table>";
            
            // close database connection
            mysqli_close($conn);
            ?>

