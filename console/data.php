<?php
header('Content-Type: application/json');


	include "../connection_code_to_data_base.php"; 

$sqlQuery = 'SELECT DATE_FORMAT(`date_time_zap`,"%Y-%m-%d") as "date" , COUNT(*) as "pos" FROM talon WHERE DATE_FORMAT(`date_time_zap`,"%Y-%m-%d") <= "'.$_POST['month'].'-31" AND DATE_FORMAT(`date_time_zap`,"%Y-%m-%d") >= 	 "'.$_POST['month'].'-01" GROUP BY DATE_FORMAT(`date_time_zap`,"%Y-%m-%d") ORDER BY date ASC';

	$res = mysqli_query($DB, $sqlQuery);

$data = array();

foreach ($res as $row) {
	$data[] = $row;
}

mysqli_close($DB);

echo json_encode($data);
?>