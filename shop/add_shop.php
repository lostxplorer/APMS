<?php
include 'navbar.php';
?>

    <div class="container mt-5">
      <h1>Add shop</h1>
      <form action="add_shop1.php" method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="shop_name">shop Name</label>
            <input type="text" class="form-control" id="shop_name" name="shop_name"  required>
          </div>
          <div class="form-group col-md-6">
            <label for="shop_phone">shop Phone</label>
            <input type="text" class="form-control" id="shop_phone" name="shop_phone"  required>
          </div>
        </div>
        <div class="form-group">
          <label for="shop_address">Address</label>
          <textarea class="form-control" id="shop_address" name="shop_address" rows="3"></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="area">Area</label>
            <input type="text" class="form-control" id="area" name="area"  required>
          </div>
          <div class="form-group col-md-6">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city"  required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="district">District</label>
            <input type="text" class="form-control" id="district" name="district" required>
          </div>
          <div class="form-group col-md-4">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" required>
          </div>
          <div class="form-group col-md-4">
            <label for="pincode">Pincode</label>
            <input type="text" class="form-control" id="pincode" name="pincode" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6 form-inline">
          <label for="location">Location:</label>
      <input type="text" name="location" id="location" class="form-control" required>
      <button type="button" onclick="getLocation()" class="btn btn-primary">Get Location</button>

          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
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
  const locationInput = document.getElementById("location");
  locationInput.value = `${lat}, ${lng}`;
}

  </script>
</html>
