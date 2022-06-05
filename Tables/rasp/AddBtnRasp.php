<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$DAYS_START = $_POST['DAYS_START'];
	$DAYS_END = $_POST['DAYS_END'];
	$HOURS_START = $_POST['HOURS_START'];
	$HOURS_END = $_POST['HOURS_END'];
	
	$SQL="INSERT INTO rasp (DAYS_START, DAYS_END,HOURS_START,HOURS_END) values ('$DAYS_START','$DAYS_END','$HOURS_START','$HOURS_END');";
	if($DB->query($SQL)){
	header("Location: rasp.php");
	};
?>