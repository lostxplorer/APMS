<?php
include 'DBConnect.php';
// Get the values from the $_POST array
$shop_id = $_POST['shop_id'];
$service = $_POST['service'];
$time_taken = $_POST['time_taken'];

// Create the MySQL query
$query = "INSERT INTO services (shop_id, service, time_taken) VALUES ('$shop_id', '$service', '$time_taken')";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
  echo "Record inserted successfully.";
  header("location:add_shop.php");
} else {
  echo "<script>alert('Error adding service');window.location.href = 'add_service.php';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
