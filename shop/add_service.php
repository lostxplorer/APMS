<?php
include 'DBConnect.php';
include 'navbar.php';
$shop_id = $_GET['shop_id'];
?>

<form action = "add_service1.php" method="POST">
  <div class="form-group container">
    <label for="service">Service:</label>
    <input type="text" class="form-control" id="service" name="service" required>
    <br><br>
    <label for="time-taken">Time Taken:</label>
    <div class="input-group">
      <input type="number" class="form-control" id="time-taken" name="time_taken" min="1" required>
      <div class="input-group-append">
        <span class="input-group-text">minutes</span>
      </div>
</div>
<br><br>
    <input type="hidden" name="shop_id" value = <?php echo $shop_id; ?>>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
