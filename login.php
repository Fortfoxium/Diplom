<?php 
$login=$_POST['login_log'];
$password=$_POST['password_log'];
$back = $_SERVER['HTTP_REFERER'];
include "connection_code_to_data_base.php";
$result=mysqli_query($DB, 'SELECT fk_role, login, password, fk_pacient FROM user, pacient, doctor, role WHERE (doctor.id_doctor=user.fk_doctor OR pacient.id_pacient=user.fk_pacient OR user.fk_role=role.id_role) and login="'.$login.'"and password="'.$password.'"');
$user=mysqli_fetch_assoc($result);
	SESSION_START();
	if (!empty($user['fk_role'])){
	$_SESSION['login']=$login;
$result=mysqli_query($DB, 'SELECT name_role FROM role WHERE id_role="'.$user['fk_role'].'"');
$role=mysqli_fetch_assoc($result);
		if (!empty($user['fk_pacient'])){$_SESSION['id']=$user['fk_pacient'];}
	$_SESSION['role']=$role['name_role'];
	echo'
	<html>
	<head> 	
	<Meta http-equiv="refresh" content="0; URL='.$_SERVER['HTTP_REFERER'].'">
	</head>
	</html>';
	} else {
	$_SESSION['ERROR']="ERROR";
	echo'
	<html>
	<head>	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/#zatemnenie_log">
	</head>
	</html>;';
	};
?>