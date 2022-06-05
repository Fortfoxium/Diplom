<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$ID_PACIENT = $_REQUEST['ID_PACIENT'];
	$FName = $_REQUEST['FName'];
	$Name = $_REQUEST['Name'];
	$OtchName = $_REQUEST['OtchName'];
	$Date_Born = $_REQUEST['Date_Born'];
	$ID_Cart = $_REQUEST['ID_Cart'];
	$EMail = $_REQUEST['EMail'];
	$Tel = $_REQUEST['Tel'];
	$OMS = $_REQUEST['OMS'];
	$Street = $_REQUEST['Street'];
	$Building = $_REQUEST['Building'];
	$Pol = $_REQUEST['Pol'];
	$Apart = $_REQUEST['Apart'];
	$SQL="UPDATE pacient SET ID_PACIENT ='$ID_PACIENT', FName ='$FName', Name='$Name', OtchName ='$OtchName',Date_Born ='$Date_Born', ID_Cart ='$ID_Cart',EMail ='$EMail', Tel ='$Tel', EMail ='$EMail', OMS ='$OMS', Street ='$Street', Building ='$Building',Pol ='$Pol',Apart ='$Apart' WHERE ID_PACIENT='$ID_PACIENT'";
	if($DB->query($SQL)){
	header("Location: pacient.php");
	};
?>