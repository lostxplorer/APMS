<form action="test1.php" method="post">
  <label for="location">Location:</label>
  <input type="text" name="location" id="location" required>
  
  <button type="button" onclick="getLocation()">Get Location</button>

  <input type="submit" value="Submit">
</form>
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



