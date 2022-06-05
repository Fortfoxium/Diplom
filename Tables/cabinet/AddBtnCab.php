<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$Med_Usl = $_POST['Med_Usl'];
	
	$SQL="INSERT INTO usluga (Med_Usl) values ('$Med_Usl');";
	if($DB->query($SQL)){
	header("Location: usluga.php");
	};
?>