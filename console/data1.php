<?php
header('Content-Type: application/json');


	include "../connection_code_to_data_base.php"; 

$DB->query("SET @@lc_time_names = 'ru_RU'");

$sqlQuery = 'SELECT cabinet.name_cabinet as "cab", MONTHNAME(date_time_zap) as "month", COUNT(*) as "count" FROM doctor JOIN cabinet ON doctor.fk_cabinet = cabinet.id_cabinet JOIN talon ON talon.fk_doctor= doctor.id_doctor AND DATE_FORMAT(`date_time_zap`,"%Y") = "'.$_POST['year'].'" GROUP BY cabinet.name_cabinet, MONTHNAME(date_time_zap);';

	$res = mysqli_query($DB, $sqlQuery);

$data = array();

foreach ($res as $row) {
	$data[] = $row;
}

mysqli_close($DB);

echo json_encode($data);
?>
