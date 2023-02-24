<?php
// include the database connection code
include '../DBConnect.php';

// get the selected state from the GET parameters
$state = $_GET['state'];

// fetch the districts for the selected state from the database
$stmt = $conn->prepare('SELECT DISTINCT district FROM shops WHERE state = ?');
$stmt->bind_param('s', $state);
$stmt->execute();
$result = $stmt->get_result();

// generate the HTML options for the districts
$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['district'] . '">' . $row['district'] . '</option>';
}

// return the HTML options
echo $options;
?>
