<?php
// include the database connection code
include '../DBConnect.php';

// fetch the distinct states from the hospitals table
$result = $conn->query('SELECT DISTINCT state FROM shops');

// generate the HTML options for the states
$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['state'] . '">' . $row['state'] . '</option>';
}

// return the HTML options
echo $options;
?>
