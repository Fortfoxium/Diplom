<?php
header('Content-Type: application/json');


	include "../connection_code_to_data_base.php"; 

$sqlQuery = 'SELECT QUARTER("'.$_POST['quarter'].'") as "quarter", COUNT(*) as "count" FROM talon GROUP BY QUARTER("'.$_POST['quarter'].'") ORDER BY QUARTER("'.$_POST['quarter'].'");';

	$res = mysqli_query($DB, $sqlQuery);

$data = array();

foreach ($res as $row) {
	$data[] = $row;
}

mysqli_close($DB);

echo json_encode($data);
?>
