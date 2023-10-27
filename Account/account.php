<?php 
	SESSION_START();
	include "../connection_code_to_data_base.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8"> 
<title>Личный кабинет на сайте Поликлиники №2 г. Калининграда</title>
<style type="text/css">
	#Zap{left: 250px; top: 50px; width: 80%; 
		background-color:#9ed0ff;
		position:absolute; 
        color: #2568a7;
        padding: 15px;
		overflow:auto;
        display: none;
        margin: auto;
        border: 0.1em solid;
    }
	#Zap:target {display: block;}
	li{margin: 25px 0; width:100%; height:auto; text-align:center; color: black }
	li:hover{background-color:#2568a7 ;}
	input {border: 0px; }
	#sortir{
		list-style:none;
	}
	
	#nastr{
		left: 250px; 
		top: 50px; 
		width: 70%; 
        border: 0.1em solid;
		background-color:#9ed0ff; 
		position:absolute; 
		height:350px; 
		border:1px;
		padding: 10px;font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; 
		}

		#things{
			list-style-type: none; 
			padding: 10px; 
			font-family: Century Gothic, Helvetica, Arial, sans-serif;
			font-size: 18px; 

		
		}
		#pass  { display: table;      }
#pass label { display: table-cell; }
#pass input { display: table-cell; margin-left: 2%;  margin-top: 2%; width: 150px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
  border: 0.1em solid}
  button{
	margin-left: 2%;  margin-top: 2%; width: 150px; height: 35px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
</style>
</head>
<body style="padding: 0px; margin:0px;">

	<script src="../jquery-3.6.3.js"></script>
	<script>
	function sortList() {
		
	}
	function show_zap() {
								document.getElementById("nastr").style.display="none";
								document.getElementById("Zap").style.display="block";
	}
	
	function show_nstr() {
								document.getElementById("Zap").style.display="none";
								document.getElementById("nastr").style.display="block";
	}
</script>
	<div style="height: 100%; width: 200px; background-color:#9ed0ff; position:fixed;">
		<ul id='things' >
			<li ><a href="../index.php" style="text-decoration: none; ">На главную</a></li>
			<li ><a href="../exit.php" style="text-decoration: none;" onclick="return confirm('Вы уверены что хотите выйти?');">Выход из аккаунта</a></li>
			<?php
			IF($_SESSION['role']!=="Registrator"){
				echo ('<li ><a href="#Zap" onclick="show_zap()" style="text-decoration: none;">Моя амбулаторная карта</a></li>');
			}		
			?>	
			
			<li ><a href="#nstr" onclick="show_nstr()" style="text-decoration: none;">Настройки аккаунта</a></li>
		</ul>
	</div>
<div id="Zap" name="Zap" style="display: none;">
<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px;"  > История записей в поликлинику </p>
<center>
<ul  id='sortir'>
	<?php 
	$result=mysqli_query($DB, 'SELECT talon.description,  doctor.name_doctor, doctor.fname_doctor, doctor.otchname_doctor, talon.date_time_zap, talon.date_talon, pacient.name, pacient.fname, pacient.otchname FROM  doctor,talon, pacient, user WHERE user.login="'.$_SESSION['login'].'" and user.fk_pacient=pacient.id_pacient and pacient.id_pacient=talon.fk_pacient and doctor.id_doctor=talon.fk_doctor');
		foreach($result as $row){
			
			echo("<li class='talon' style='height: 300px; width: 70%; 
			background: #fff; position:relative;
			display: inline-block; padding:35px; margin-bottom:10px; overflow:auto;  text-align: left;'>");
			echo("<form action='pdf.php' method='POST' id='pdf'> ");	
			echo("<p style='text-align:center;'><b>Государственное бюджетное учреждение</br> здравоохранения города Калининграда </b></p><p style='text-align:center;'><b>СПРАВКА </b></p><p><b>Ф.И.О.: </b><u>".$row['fname']." ".$row['name']." ".$row['otchname']."</u></p><b>Дата и время записи на приём</b>: <u>".$row['date_time_zap']."</u><input   type='text' name='date_time_zap' id='date_time_zap' hidden value='".$row["date_time_zap"]."'></p>");
			echo("<b>Заключение и рекомендации</b>: <u>".$row['description']."</u></p>");
			echo("<p style='text-align:left;'> <b>Дата</b>: <u>".$row['date_talon']."</u><input type='date' name='date_talon' id='date_talon' hidden value='".$row["date_talon"]."'><span style='float:right;'> <b>Ф.И.О. врача</b>: <u>".$row['fname_doctor']." ".$row['name_doctor']." ".$row['otchname_doctor']."</u></span><input  type='text' hidden  name='name_doctor' id='name_doctor' value='".$row["name_doctor"]."'> <input hidden  id='fname_doctor' name='fname_doctor' type='text' value='".$row["fname_doctor"]."'> <input  hidden name='otchname_doctor' id='otchname_doctor'  type='text' value='".$row["otchname_doctor"]."'></p></br>");
			
			
			echo("<button type='submit'style='width:250px' >Вывести талон на посещение врача в PDF</button>");
			echo("</form>");
			echo("</li>");
		};
	?>
	</ul>
	</center>
</div>

<div id="nastr" name="nastr" style="display: none;">
<form action="change.php" method="POST" id="pass">
	<p>Для изменения пароля введите старый пароль, и повторите дважды новый, затем нажмите кнопку "Отправить".</p>
	<label>Старый пароль <input type="password" id='old_pass' name='old_pass'></label></br>
	<label>Новый пароль <input type="password" id='new_pass' name='new_pass'></label></br>
	<label>Повторите пароль<input type="password" id='new_pass_again' name='new_pass_again'></label></br>
<?php 
						 	if($_SESSION['ERROR']=="ERROR"){
				echo("<p style='color:red'> Данные введены неверно</p></br>");
				$_SESSION['ERROR']="";
			}
			 ?>
	<button id="send" name="send" type="submit"> Отправить</button>	
</form>
	

</div>
</body>
</html>