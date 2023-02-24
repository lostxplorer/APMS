<?php
include 'DBConnect.php';
include 'navbar.php';
// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the values from the form
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

    // Construct the MySQL query to update the record
    $query = "UPDATE shops SET shop_name='$shop_name', shop_address='$shop_address', shop_phone='$shop_phone', area='$area', city='$city', district='$district', state='$state', pincode='$pincode', location='$location' WHERE shop_id='$shop_id'";

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
$query = "SELECT shop_id, shop_name, shop_address, shop_phone, area, city, district, state, pincode, location FROM shops WHERE shop_id='$shop_id'";

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
      <title>Edit Shop</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container mt-4">
        <h2>Edit Shop</h2>
        <form method="POST" action="">
          <div class="form-group">
            <label for="shop_id">Shop ID:</label>
            <input type="text" class="form-control" id="shop_id" name="shop_id" value="<?php echo $row['shop_id']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="shop_name">Shop Name:</label>
            <input type="text" class="form-control" id="shop_name" name="shop_name" value="<?php echo $row['shop_name']; ?>">
          </div>
          <div class="form-group">
            <label for="shop_address">Shop Address:</label>
            <input type="text" class="form-control" id="shop_address" name="shop_address" value="<?php echo $row['shop_address']; ?>">
          </div>
          <div class="form-group">
            <label for="shop_phone">Shop Phone:</label>
            <input type="text" class="form-control" id="shop_phone" name="shop_phone" value="<?php echo $row['shop_phone']; ?>">
    </div>
    <div class="form-group">
    <label for="area">Area:</label>
    <input type="text" class="form-control" id="area" name="area" value="<?php echo $row['area']; ?>">
    </div>
    <div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>">
    </div>
    <div class="form-group">
    <label for="district">District:</label>
    <input type="text" class="form-control" id="district" name="district" value="<?php echo $row['district']; ?>">
    </div>
    <div class="form-group">
    <label for="state">State:</label>
    <input type="text" class="form-control" id="state" name="state" value="<?php echo $row['state']; ?>">
    </div>
    <div class="form-group">
    <label for="pincode">Pincode:</label>
    <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $row['pincode']; ?>">
    </div>
    <div class="form-row">
          <div class="form-group col-md-6 form-inline">
          <label for="location">Location:</label>
      <input type="text" name="location" id="location" class="form-control" value="<?php echo $row['location']; ?>" required>
      <button type="button" onclick="getLocation()" class="btn btn-primary">Get Location</button>

          </div>
        </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

      </div>
    </body>
    <script>
    function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
  const latv = position.coords.latitude > 0 ? 'N' : 'S';
	const lngv = position.coords.longitude > 0 ? 'E' : 'W';
  const locationInput = document.getElementById("location");
  console.log(locationInput.value);
  locationInput.value = `${lat}, ${lng}`;
}

  </script>
    </html>
<?php
} else {
    echo "No record found.";
}
// Close the database conn
mysqli_close($conn);
?>
