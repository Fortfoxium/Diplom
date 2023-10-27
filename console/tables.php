<?php
if($_GET['tab'] == 'cabinet'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == 'talon'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>';
};

if($_GET['tab'] == 'doctor'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == "user"){
session_start();
  $_SESSION["table"]="user";
	echo('
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>');
	};

if($_GET['tab'] == 'role'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == 'rasp'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};

if($_GET['tab'] == 'pacient'){
session_start();
  $_SESSION['table'] = $_GET['tab'];
	echo'
	<html>
	<head>
	<Meta http-equiv="refresh" content="0; URL=http://websiteofpoliklinika/console/index_admin.php#table_cabinet">
	</head>
	</html>';
	};
?>