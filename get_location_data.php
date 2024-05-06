<?php
// get_location_data.php
require_once 'db/dbhelper.php';

$data = array();

// Get cities, districts, and wards data from database
$cities = executeResult("SELECT * FROM cities");
$districts = executeResult("SELECT * FROM districts");
$wards = executeResult("SELECT * FROM wards");

$data['cities'] = $cities;
$data['districts'] = $districts;
$data['wards'] = $wards;

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
