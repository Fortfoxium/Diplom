<?php
$login=$_POST['login'];
$password=$_POST['password'];

$name=$_POST['name_pac'];
$fname=$_POST['fname_pac'];
$otchname=$_POST['otchname_pac'];
$date_born=$_POST['date_born'];
$pol=$_POST['pol'];
$tel=$_POST['tel'];
$oms=$_POST['oms'];
$email=$_POST['email'];
$street=$_POST['street'];
$building=$_POST['building'];
$apart=$_POST['apart'];

include "../connection_code_to_data_base.php";
$query = "SELECT login FROM user WHERE login='".$login."';";
$res = mysqli_query($DB, $query);
$inf = mysqli_fetch_array($res);

$mycop='INSERT INTO pacient (fname, name, otchname, date_born, email, tel, oms, street, building, apart ,pol) VALUES ("'.$fname.'", "'.$name.'", "'.$otchname.'", "'.$date_born.'", "'.$email.'", "'.$tel.'", "'.$oms.'", "'.$street.'", "'.$building.'", "'.$apart.'", "'.$pol.'")';
$insert=mysqli_query($DB, $mycop);
$query = "SELECT MAX(`id_pacient`) as 'h' FROM `pacient`";
		$res =	mysqli_query($DB, $query);
		$inf = mysqli_fetch_array($res);
		$query='INSERT INTO user (login, password, fk_role, fk_pacient) VALUES ("'.$login.'", "'.$password.'", 2,'.$inf['h'].')';
			$insert=mysqli_query($DB, $query);

		echo($query);
		echo($inf['h']);
		echo($mycop);
               exit("<Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/For_workers/ambulotor.php'>");

?>