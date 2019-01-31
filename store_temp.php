<?php

require_once 'model/mesure.php';
$Mesure = new Mesure();

$data_json = file_get_contents('php://input');
$data = json_decode($data_json);

if (!$data) {
    http_response_code(415);
    exit();
} elseif (!$data->temperature || !$data->humidite) {
    http_response_code(400);
    exit();
}

$op = file_put_contents($temperature_file, $data_json);

if (!$op) {
    http_response_code(500);
} else {
    $temp = $data->temperature;
    $humi = $data->humidite;
    $Mesure->sendData($humi, $temp);
}
