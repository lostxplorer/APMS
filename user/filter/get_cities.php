<?php
// include the database connection code
include '../DBConnect.php';

// get the selected state and district from the GET parameters
$state = $_GET['state'];
$district = $_GET['district'];

// fetch the cities for the selected state and district from the database
$stmt = $conn->prepare('SELECT DISTINCT city FROM shops WHERE state = ? AND district = ?');
$stmt->bind_param('ss', $state, $district);
$stmt->execute();
$result = $stmt->get_result();

// generate the HTML options for the cities
$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['city'] . '">' . $row['city'] . '</option>';
}

// return the HTML options
echo $options;
?>
