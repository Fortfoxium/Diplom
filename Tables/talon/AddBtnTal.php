<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$DateZap = $_POST['DateZap'];
	$TimeZap = $_POST['TimeZap'];
	$DATATALON = $_POST['DATATALON'];
	$Cab = $_POST['Cab'];
	$ID_PACIENT = $_POST['ID_PACIENT'];
	$SQL="INSERT INTO talon (DateZap,TimeZap,DATATALON,Cab,ID_PACIENT) values ('$DateZap','$TimeZap','$DATATALON','$Cab','$ID_PACIENT');";
	if($DB->query($SQL)){
	header("Location: talon.php");
	};
?>