<?php
include 'DBConnect.php';
// Get the form data from $_POST
$shop_id = $_POST['shop_id'];
$shop_name = $_POST['shop_name'];
$shop_address = $_POST['shop_address'];
$shop_phone = $_POST['shop_phone'];
$area = $_POST['area'];
$city = $_POST['city'];
$district = $_POST['district'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$location = $_POST['location'];

// Escape special characters to prevent SQL injection attacks
$shop_id = mysqli_real_escape_string($conn, $shop_id);
$shop_name = mysqli_real_escape_string($conn, $shop_name);
$shop_address = mysqli_real_escape_string($conn, $shop_address);
$shop_phone = mysqli_real_escape_string($conn, $shop_phone);
$area = mysqli_real_escape_string($conn, $area);
$city = mysqli_real_escape_string($conn, $city);
$district = mysqli_real_escape_string($conn, $district);
$state = mysqli_real_escape_string($conn, $state);
$pincode = mysqli_real_escape_string($conn, $pincode);
$location = mysqli_real_escape_string($conn, $location);

// Create an SQL query with placeholders
$sql = "INSERT INTO shops (shop_id, shop_name, shop_address, shop_phone, area, city, district, state, pincode, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Create a prepared statement with the query
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
  echo "Error: " . mysqli_error($conn);
} else {
  // Bind the form data to the prepared statement
  mysqli_stmt_bind_param($stmt, "isssssssis", $shop_id, $shop_name, $shop_address, $shop_phone, $area, $city, $district, $state, $pincode, $location);

  // Execute the prepared statement and check for errors
  if (mysqli_stmt_execute($stmt)) {
    echo "shop added successfully!";
    mysqli_stmt_close($stmt);
  mysqli_close($conn);

header("location:add_shop.php");
  } else {
    echo "<script>alert('Error adding shop');window.location.href = 'add_shop.php';</script>";
    
  }
}

// Close the prepared statement and database connection

?>
