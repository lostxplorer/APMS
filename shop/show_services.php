<?php
include 'DBConnect.php';
include 'navbar.php';

$shop_id = $_GET['shop_id'];

// Construct the MySQL query
$query = "SELECT shop_id, service, time_taken FROM services WHERE shop_id =".$shop_id;

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
  // If the query returned rows, display them in a table
  echo '<table class="table">';
  echo '<thead class="thead-dark">';
  echo '<tr><th>Shop ID</th><th>Service</th><th>Time Taken</th><th>edit</th></tr>';
  echo '</thead>';
  echo '<tbody>';

  // Loop through each row returned by the query and display it in a table row
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['shop_id'] . '</td>';
    echo '<td>' . $row['service'] . '</td>';
    echo '<td>' . $row['time_taken'] . '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
} else {
  // If the query didn't return any rows, display a message
  echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>
