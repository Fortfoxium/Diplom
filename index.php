<?php
	SESSION_START();
	define('ROOT', __DIR__);
	include "connection_code_to_data_base.php";
	if($_SESSION['role']=="Admin")
	{
	echo "<html> <head> <Meta http-equiv='refresh' content='0; URL=console/index_admin.php'> </head> </html>";
	};
?>
	<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>Официальный сайт поликлинники №2 г. Калининграда: главная</title>
        <link rel="stylesheet" href='base_of_pages.css'>
	</head>
	<body>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php') ?>
		<div id="pagewrap">

		<div id="zatemnenie_log" class="zatemnenie_log">
			 <div id="okno_log" class="okno_log">
				<p id="text_log" class="text_log" style="font-family: Century Gothic, Helvetica, Arial, sans-serif;" >Авторизация</p> <a href="#" class="close">Х</a>
				<div name="polosa" id="polosa" class="polosa"></div>
				<form action="login.php" method="POST">
					<input type="text" placeholder="Логин" size="24" name="login_log" id="login_log" class="login_log" required>
					<input type="password" placeholder="Пароль" size="24" name="password_log" id="password_log" class="password_log" required>
					<?php
						$log=$_SESSION['login'];
						$result=mysqli_query($DB, 'SELECT login FROM user WHERE login="'.$log.'"');
						$user=mysqli_fetch_assoc($result);
						 	if($_SESSION['ERROR']=="ERROR"){
				echo("<p style='color:red'> Такой пользователь не найден</p>");
				$_SESSION['ERROR']="";
			}
					 ?></br>
					<button id="button_log" class="button_log" name="button_log" type="submit"> Войти</button>
				</form>
			</div>
		</div>


<img src='img/big_img.png' id='big_img' style="margin-bottom: 0" >
<div id="wrapper">
						<main>
	<div name='infa' id='infa'>
		<h1>О нас</h1>
		<p>
			Официальное открытие учреждение здравоохранения «ГБУЗ поликлиника №2 города Калининграда» состоялось 01.10.2022. Многопрофильная поликлиника в Ленинградском районе рассчитана на 400 посещений в смену и обслуживает 4 тыс. взрослого населения.
</p><p>
Для оснащения поликлиники закуплено современное оборудование, в т.ч. рентгенодиагностические аппараты с цифровой системой получения изображения, маммограф с возможностью проведения автоматической стереотехнической биопсии, аппараты для ультразвуковых исследований среднего и высокого класса, гематологические анализаторы, физиотерапевтические аппараты, эндо видеохирургический комплекс для оснащения урологического центра, оборудование для кабинетов функциональной диагностики и реабилитации пациентов.
</p><p>
В поликлинике  внедрены информационные комплексы и технологии, направленные на расширение спектра оказания электронных услуг пациентам: электронная регистратура (инфокиоск, информационно-справочное табло)  предоставляет пользователям возможность самостоятельной записи на прием к врачу, а также получения справочной информации о работе учреждения.
</p>
<h1>Расписание работы поликлиники</h1>
		</div>
		<div name='NEWS' id='NEWS'>
			<h1>Новости</h1>
			<p>
			Новый кабинет в отделении</br>
			14.03.2023
			</p>
			<p>
			Закупка нового оборудования</br>
			14.02.2023
			</p>
			<p>
			Новая вакансия</br>
			11.01.2023
			</p>
		</div>
<style>
/* у таблицы может быть любой класс или id */


.demotable a[href^="#all"], .demotable a[href="#close"] {
  text-decoration: none;
  border-bottom: 1px dashed;
}

/* здесь вся магия, если браузер не поддерживает структурные псевдоклассы, то список будет раскрыт, т.е. доступ к данным сохранится */
[id^="all"] {
  position: fixed;  /* чтобы страница "не подпрыгивала" к id */
}
[id^="all"]:target + table a[href^="#all"],
[id^="all"]:not(:target) + table tbody tr:nth-of-type(n+4),  /* 4 - это порядковый номер tr, после которого строки будут изначально удалены (включительно) */
[id^="all"]:not(:target) + table a[href="#close"] {
  display: none;
}

</style>

<!-- таких "сжатых" HTML таблиц может быть сколько угодно. Только не забывайте менять id all1 на all2 или all40 -->
<br id="all1"/><table class="demotable" id="table">
	  <thead>
		  <tr>
  <tfoot>
    <tr>
       <td colspan="3"><a href="#close" class="table_links">Свернуть</a><a href="#all1" class="table_links">Развернуть</a>
	    </tfoot>
	 
		<tr>
		<th>Кабинет и врач</th>
		<th>Понедельник</th>
		<th>Вторник</th>
		<th>Среда</th>
		<th>Четверг</th>
		<th>Пятница</th>
		<th>Суббота</th>
		<th>Воскресенье</th>
		</tr></thead> <tbody>
		<?php 
		$query = "SELECT doctor.name_doctor, doctor.fname_doctor, doctor.otchname_doctor, cabinet.name_cabinet, rasp.start_hours, rasp.end_hours, rasp.start_day, rasp.end_day FROM  rasp, cabinet, doctor where doctor.fk_cabinet=cabinet.id_cabinet and cabinet.fk_rasp=rasp.id_rasp" ;
			$res = mysqli_query($DB, $query);

			$days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
	
		  while($row = mysqli_fetch_array($res)){
		  			$first= array_search($row['start_day'],$days);
			$last= array_search($row['end_day'],$days);
			
             echo "<tr> <td>".$row[0]." ".$row[1]."</br>".$row[2]."</br>".$row[3]."</td>";
			if (in_array(1, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td>Выходной</td>"; 
    	} 

    	if (in_array(2, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td>Выходной</td>"; 
    	} 

    	if (in_array(3, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td>Выходной</td>"; 
    	} 

    	if (in_array(4, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td>Выходной</td>"; 
    	} 

    	if (in_array(5, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td>Выходной</td>"; 
    	} 

    	if (in_array(6, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td>Выходной</td>"; 
    	} 
        
	echo  "<td>Выходной</td></tr>";
}
            ?>

	  </tbody>
	</table>

	</div>
					</main>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>

		</div>
	</div>
	</body>
</html>