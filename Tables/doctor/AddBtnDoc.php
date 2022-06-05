<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$FName_Doc = $_POST['FName_Doc'];
	$Name_Doc = $_POST['Name_Doc'];	
	$OTCHName_Doc = $_POST['OtchName_Doc'];
	$ID_RASP = $_POST['ID_RASP'];
	
	$SQL="INSERT INTO doctor (FName_Doc,Name_Doc,OTCHName_Doc,ID_RASP) values ('$FName_Doc','$Name_Doc','$OTCHName_Doc','$ID_RASP');";
	if($DB->query($SQL)){
	header("Location: doctor.php");
	};
?>