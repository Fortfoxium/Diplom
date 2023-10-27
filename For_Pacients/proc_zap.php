<?php 
	SESSION_START();
	include "../connection_code_to_data_base.php";
$doctor=$_POST['Cabinet'];
$day=$_POST['rasp'];
$time=$_POST['tim'];

if($_SESSION['role']=="Registrator"){
	$pacient=$_POST['pacient'];
} ELSE {
	$pacient=$_SESSION['id'];
}

$query = "INSERT INTO `talon` (`id_talon`, `fk_pacient`, `fk_doctor`, `date_talon`, `date_time_zap`) VALUES (NULL, ".$pacient.", ".$doctor.", '".date("Y-m-d")."', '".$day." ".$time."')";
echo $query;
$res = mysqli_query($DB, $query);

exit("<Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/For_Pacients/zap.php'>");
?>