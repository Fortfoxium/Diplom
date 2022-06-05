<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$FName = $_POST['FName'];
	$Name = $_POST['Name'];
	$OtchName = $_POST['OtchName'];
	$Date_Born = $_POST['Date_Born'];
	$ID_Cart = $_POST['ID_Cart'];
	$EMail = $_POST['EMail'];
	$Tel = $_POST['Tel'];
	$OMS = $_POST['OMS'];
	$Street = $_POST['Street'];
	$Building = $_POST['Building'];
	$Pol = $_POST['Pol'];
	$Apart = $_POST['Apart'];
	
	$SQL="INSERT INTO pacient (FName,Name,OtchName,Date_Born,ID_Cart,EMail,Tel,OMS,Street,Building,Pol,Apart) values ('$FName','$Name','$OtchName','$Date_Born','$ID_Cart','$EMail','$Tel','$OMS','$Street','$Building','$Pol','$Apart');";
	if($DB->query($SQL)){
	header("Location: pacient.php");
	};
?>