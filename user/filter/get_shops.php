<?php
// include the database connection code
include '../DBConnect.php';

// build the WHERE clause for the SQL query based on the filter options
$where = '1 = 1'; // default WHERE clause (selects all rows)
if (!empty($_GET['state'])) {
    $where .= ' AND state = "' . $_GET['state'] . '"';
}
if (!empty($_GET['district'])) {
    $where .= ' AND district = "' . $_GET['district'] . '"';
}
if (!empty($_GET['city'])) {
    $where .= ' AND city = "' . $_GET['city'] . '"';
}
if (!empty($_GET['area'])) {
    $where .= ' AND area = "' . $_GET['area'] . '"';
}
if (!empty($_GET['pincode'])) {
    $where .= ' AND pincode = "' . $_GET['pincode'] . '"';
}
if (!empty($_GET['shop_name'])) {
    $where .= ' AND shop_name LIKE  "%' . $_GET['shop_name'] . '%"';
}

// fetch the hospitals table based on the filter options

?>


<table class="table">
  <thead>
    <tr>
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
    $sql = 'SELECT * FROM shops WHERE ' . $where;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["shop_name"] . "</td>";
        echo "<td>" . $row["shop_address"] . "</td>";
        echo "<td>" . $row["shop_phone"] . "</td>";
        echo "<td>" . $row["area"] . "</td>";
        echo "<td>" . $row["city"] . "</td>";
        echo "<td>" . $row["district"] . "</td>";
        echo "<td>" . $row["state"] . "</td>";
        echo "<td>" . $row["pincode"] . "</td>";
        echo "<td>" . $row["location"] . "</td>";
        echo "<td>";?><input type='button' value='Book Appointment' class='btn btn-primary' onclick="redirect('book_appointment.php?shop_id=<?php echo $row['shop_id']?>')"></td><?php echo"";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='10'>No shops found</td></tr>";
    }
    mysqli_close($conn);
    ?>
  </tbody>
</table>
<script>
    function redirect(link) {
  window.location.href = link;
}
</script>
