<?php
header("Content-Type: application/json");

$apiURL = 'https://lorndalin.tsdsolution.net/api/DriverController/product';

$response = @file_get_contents($apiURL);

if ($response === FALSE) {
    echo json_encode(['error' => 'Cannot fetch data']);
} else {
    echo $response;
}
