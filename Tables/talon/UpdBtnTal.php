<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$ID_Talon = $_REQUEST['ID_Talon'];
	$DateZap = $_REQUEST['DateZap'];
	$TimeZap = $_REQUEST['TimeZap'];
	$DATATALON = $_REQUEST['DATATALON'];
	$Cab = $_REQUEST['Cab'];
	$ID_PACIENT = $_REQUEST['ID_PACIENT'];
	$SQL="UPDATE talon SET ID_Talon ='$ID_Talon', DateZap ='$DateZap',  TimeZap ='$TimeZap',  DATATALON ='$DATATALON',  Cab ='$Cab',  ID_PACIENT ='$ID_PACIENT' WHERE ID_PACIENT='$ID_PACIENT'";
	if($DB->query($SQL)){
	header("Location: talon.php");
	};
?>