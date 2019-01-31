<?php  
$data_json = file_get_contents('php://input');
$temperature_file = ("data.json");
$data = json_decode($data_json);
require 'addtemp.php';

	if (! $data){
		http_response_code(415);
		exit();
	}

	elseif (! $data->temperature || ! $data->humidite){
		http_response_code(400);
		exit();
	}

	$op = file_put_contents($temperature_file, $data_json);

	if (! $op){
		http_response_code(500);
	} else {
		addtemp();
	}


?>