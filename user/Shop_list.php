<?php
include 'navbar.php';
?>

<table class="table">
  <thead>
    <tr>
      <th>shop ID</th>
      <th>shop Name</th>
      <th>shop Address</th>
      <th>shop Phone</th>
      <th>Area</th>
      <th>City</th>
      <th>District</th>
      <th>State</th>
      <th>Pincode</th>
      <th>Location</th>
      <th>click</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'DBConnect.php';
    $sql = "SELECT * FROM shops";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["shop_id"] . "</td>";
        echo "<td>" . $row["shop_name"] . "</td>";
        echo "<td>" . $row["shop_address"] . "</td>";
        echo "<td>" . $row["shop_phone"] . "</td>";
        echo "<td>" . $row["area"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["district"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
        echo "<td>" . $row["pincode"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td><input type='button' value='change' class='btn btn-primary'></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='10'>No shops found</td></tr>";
    }
    mysqli_close($conn);
    ?>
  </tbody>
</table>
