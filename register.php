<?php
$login=$_POST['login_log'];
$back = $_SERVER['HTTP_REFERER'];
$password1=$_POST['password_reg1'];
$password2=$_POST['password_reg2'];
include "connection_code_to_data_base.php";
$checking=mysqli_query($DB, "SELECT login FROM user WHERE login='".$login."';");
if(is_empty($checking)){
	echo('gay');
	if($password1==$password2){
	};
}


$insert=mysqli_query($DB, 'INSERT INTO user (login, password) VALUES ('.$login.', '.$password1.')');
/*
	Echo ('
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL='.$back.'">
	</head>
	</html>');*/
?>


<!--echo "<table border=10px>";
While ($Vav=mysqli_fetch_array($str)){
	Echo "<tr><td><input type='text' id='login' name='login' value=".$Vav["Login"]."></td>";
	Echo "<td><input type='text' id='Password' name='Password' value=".$Vav["Password"]."></td>";
	Echo "<td><form action='delete.php' method='POST' ><input type='text' id='ID' name='ID' value=".$Vav["ID"]."></td>";
	Echo "<td><input type='text' id='Indifier' name='Indifier' value=".$Vav["Indifier"]."></td>";
	Echo "<td><button Type='submit'>DELETE</button></form></td></tr>";
};
echo "</table>";
	} elseif ($USER['id_role']=="0" ) {
SESSION_NAME("USER");
SESSION_START();
$_SESSION[$login]='User';
   Echo ("You are usually users");*/-->