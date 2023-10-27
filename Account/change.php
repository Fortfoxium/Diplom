<?php 
	SESSION_START();
	include "../connection_code_to_data_base.php";
	$query = "SELECT password FROM user where fk_pacient=".$_SESSION['id']." and password='".$_POST['old_pass']."';" ;
	$res = mysqli_query($DB, $query);
	$inf = mysqli_fetch_array($res);

if(empty($inf))
	{
	$_SESSION['ERROR']="ERROR";
				exit("<Meta http-equiv='refresh' content='0; URL=http://".$_SERVER["SERVER_NAME"]."/Account/account.php'>");
	} 
else
	{
		if($_POST['new_pass']=$_POST['new_pass_again'])
		{
				$query = "UPDATE `user` SET `password` = ".$_POST['new_pass']." WHERE fk_pacient=".$_SESSION['id'].";" ;
				$res = mysqli_query($DB, $query);
				exit("<Meta http-equiv='refresh' content='0; URL=http://".$_SERVER["SERVER_NAME"]."/Account/account.php'>");
		}
		else
		{
			$_SESSION['ERROR']="ERROR";
				exit("<Meta http-equiv='refresh' content='0; URL=http://".$_SERVER["SERVER_NAME"]."/Account/account.php'>");
		}
	}

?>