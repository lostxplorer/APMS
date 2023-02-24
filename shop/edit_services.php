<?php
include 'DBConnect.php';
// Check if the form was submitted
if (isset($_POST['submit'])) {
  // Get the values from the form
  $shop_id = $_POST['shop_id'];
  $service = $_POST['service'];
  $time_taken = $_POST['time_taken'];
  
  // Construct the MySQL query to update the record
  $query = "UPDATE services SET service='$service', time_taken='$time_taken' WHERE shop_id='$shop_id'";
  
  // Execute the query
  $result = mysqli_query($conn, $query);
  
  // Check if the query was successful
  if ($result) {
    echo "<script>alert('Record updated successfully.');window.location.href = 'add_shop.php';</script>";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Construct the MySQL query to select the record
$shop_id = $_GET['shop_id'];
$query = "SELECT shop_id, service, time_taken FROM services WHERE shop_id='$shop_id'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
  // If the query returned a row, display it in a form for editing
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Service</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Edit Service</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="shop_id">Shop ID:</label>
        <input type="text" class="form-control" id="shop_id" name="shop_id" value="<?php echo $row['shop_id']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="service">Service:</label>
        <input type="text" class="form-control" id="service" name="service" value="<?php echo $row['service']; ?>">
      </div>
      <div class="form-group">
        <label for="time_taken">Time Taken:</label>
        <input type="text" class="form-control" id="time_taken" name="time_taken" value="<?php echo $row['time_taken']; ?>">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</body>
</html>
<?php
} else {
  // If the query didn't return a row, display a message
  echo "No results found.";
}
// Close the database connection
mysqli_close($conn);
?>
