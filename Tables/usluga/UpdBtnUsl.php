<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$ID_Med_Usl = $_REQUEST['ID_Med_Usl'];
	$Med_Usl = $_REQUEST['Med_Usl'];
	$SQL="UPDATE usluga SET ID_Med_Usl ='$ID_Med_Usl', Med_Usl ='$Med_Usl' WHERE ID_Med_Usl='$ID_Med_Usl'";
	if($DB->query($SQL)){
	header("Location: usluga.php");
	};
?>