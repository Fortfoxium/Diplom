<?php

session_start();
	include "../connection_code_to_data_base.php";
	if($_SESSION['role']!=="Registrator")
		{
				exit("<Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/index.php>");
		};
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
	<title>Просмотр списков пациентов</title>
        <link rel="stylesheet" href='../base_of_pages.css'>
</head>
<body>
<style type="text/css">
	form  { display: table;      }
form p{ display: table-row;width: 100%  }
label { display: table-cell; }
input { display: table-cell;  margin-top: 2%; width: 335px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
  border: 0.1em solid}
select{ margin-top: 2%; width: 340px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;font-size: 16px;
  border: 0.1em solid;
   }
button{
	 margin-top: 2%; width: 340px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
label{
	font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 17px;
}

</style>


<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php') ?>

<div id="wrapper" >
						<main style="padding: 15px">
	<div style=" width: 95%; height: auto; background-color: white; margin: 10px; padding: 10px;
    border-radius: 5px;">

	<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif; font-size: 17px"><b>Важно!</b></br>Для формирования расписания врачей в виде Excel файла нужно нажать кнопку.</p><form action="excel_raspisanie.php" method="POST"><button type="submit" style=" margin:  10px 0">Сформировать расписание для всех</button></form><p style="font-family: Century Gothic, Helvetica, Arial, sans-serif; font-size: 17px"> Для формирования для конкретного врача отдельно необходимо выбрать врача в списке, а потом нажать сформировать  </p>

	</div>


	<div style="width: 350px; height: auto; background-color: white; margin: 25px; padding: 10px; 
    border-radius: 5px;">
	<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif; font-size: 17px">Формирование расписание для одного врача</p>
	<form action="excel_raspisanie_one.php" method="POST" id="date" class="date">

	<select name='doctor' style=" margin:  10px 0" required>
		<?php 
		$SQL_for_select= mysqli_query($DB, "SELECT cabinet.id_cabinet, doctor.name_doctor, doctor.fname_doctor, cabinet.fk_rasp, cabinet.name_cabinet, doctor.id_doctor FROM cabinet, doctor where cabinet.id_cabinet=doctor.fk_cabinet");
		foreach($SQL_for_select as $names){
	 			echo ('<option value="'.$names[id_doctor].'">'.$names[id_doctor].' '.$names[name_cabinet].' '.$names[name_doctor].' '.$names[fname_doctor].' '.$names[otchname_doctor].'</option>');
	}
	?>
	</select></br>
	<button type="submit" style=" margin:  10px 0">Создать расписание для выбранного врача</button>
	</form>

	<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif; font-size: 17px; height: auto; background-color: white; border-radius: 5px;"><b>Важно!</b></br>
При формировании списка пациента возможны ошибки при открытии excel файла!</br>Файл сам печататься не будет, пока вы не отправите его на печать.</p>
</div>


</main>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>

		</div>
	</div>
	</body>
</html>