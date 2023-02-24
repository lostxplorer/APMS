<?php
// include the database connection code
include '../DBConnect.php';

// get the selected state, district, and city from the GET parameters
$state = $_GET['state'];
$district = $_GET['district'];
$city = $_GET['city'];

// fetch the areas for the selected state, district, and city from the database
$stmt = $conn->prepare('SELECT DISTINCT area FROM shops WHERE state = ? AND district = ? AND city = ?');
$stmt->bind_param('sss', $state, $district, $city);
$stmt->execute();
$result = $stmt->get_result();

// generate the HTML options for the areas
$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['area'] . '">' . $row['area'] . '</option>';
}

// return the HTML options
echo $options;
?>
