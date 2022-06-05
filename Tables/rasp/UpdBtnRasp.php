<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$ID_RASP = $_REQUEST['ID_RASP'];
	$DAYS_START = $_POST['DAYS_START'];
	$DAYS_END = $_POST['DAYS_END'];
	$HOURS_START = $_POST['HOURS_START'];
	$HOURS_END = $_POST['HOURS_END'];
	$SQL="UPDATE rasp SET ID_RASP ='$ID_RASP', DAYS_START ='$DAYS_START',DAYS_END='$DAYS_END' , HOURS_START='$HOURS_START' , HOURS_END='$HOURS_END' WHERE ID_RASP='$ID_RASP'";
	if($DB->query($SQL)){
	header("Location: rasp.php");
	};
?>