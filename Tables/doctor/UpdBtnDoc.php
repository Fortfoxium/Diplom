<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
	$ID_DOCTOR = $_REQUEST['ID_DOCTOR'];
	$FName_Doc = $_POST['FName_Doc'];
	$Name_Doc = $_POST['Name_Doc'];
	$OtchName_Doc = $_POST['OtchName_Doc'];
	$ID_RASP = $_POST['ID_RASP'];
	$SQL="UPDATE doctor SET ID_DOCTOR ='$ID_DOCTOR', FName_Doc ='$FName_Doc', Name_Doc ='$Name_Doc', OtchName_Doc ='$OtchName_Doc', ID_RASP ='$ID_RASP' WHERE ID_DOCTOR ='$ID_DOCTOR'";
	if($DB->query($SQL)){
	header("Location: doctor.php");
	};
?>