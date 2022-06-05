<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$CAB = $_REQUEST['CAB'];
	$ID_Med_Usl = $_REQUEST['ID_Med_Usl'];
	$SQL="UPDATE cabinet SET ID_Med_Usl ='$ID_Med_Usl', Med_Usl ='$Med_Usl' WHERE ID_Med_Usl='$ID_Med_Usl'";
	if($DB->query($SQL)){
	header("Location: cabinet.php");
	};
?>