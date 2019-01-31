<?php
$data = "data.json";
$json_source = file_get_contents($data);
$json_data = json_decode($json_source);

$degres = $json_data->temperature;
$hauteurcalc = (161 + ($degres * 4));
$topcalc = (315+-($degres * 4));
$edittime = date("d/m/Y H:i:s.", filemtime("data.json"));

require 'inc/dbconnect.php';

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="static/style.css">
	<meta charset="utf-8">
	<title>Thermomètre</title>
</head>
<body>
<h1>Température</h1>
<p>Date de prise de température : <?php echo $edittime ?> </p>
<p>Il fait <?php echo $json_data->temperature; ?>°C avec <?php echo $json_data->humidite; ?>% d'humidité.</br></p>
<div id="thermometer">
	<div id="bargraph"></div>
</div>
</body>
</html>

<style type="text/css">
	#bargraph {
		top: <?php echo $topcalc . "px" ?>;
		height: <?php echo $hauteurcalc . "px" ?>;
	}
</style>
