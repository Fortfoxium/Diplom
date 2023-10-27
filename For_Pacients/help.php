<?php
	SESSION_START();
	include "../connection_code_to_data_base.php";
	if($_SESSION['role']=="Admin")
	{
	echo "<html> <head> <Meta http-equiv='refresh' content='0; URL=../console/index_admin.php'> </head> </html>";
	};
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8"> 
<title>Официальный сайт поликлинники №2 г. Калининграда: помощь</title>
        <link rel="stylesheet" href='../base_of_pages.css'>
</head>
<body>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php') ?>

						<style>
							#problem{
								font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 19px; background-color: white;  
							}
							#problem ul{
							margin-top: 15px;
							}
						</style>
<img src='../img/big_img_help.png' id='big_img' style="margin-bottom: 0" >
<div id="wrapper">
						<main style="padding: 10px;">
<div style="padding:10px;" 	>
<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; ">Выберите вашу проблему:</p>

<ul id='problem'>
	<li>Я не могу зайти в свой аккаунт</li>
	<li>Я не могу записаться к врачу</li>
	<li>Я не могу дозвониться до регистратуры</li>
	<li>Я не могу дозвониться до тех поддержки</li>
	<li>Как мне зарегистрироваться на сайте?</li>
	<li>Что мне делать если я забыл логин/пароль?</li>
	<li>Куда я могу написать жалобу?</li>
	<li>Где мне взять мои талоны на запись?</li>
	<li>Что мне делать если я забыл логин/пароль?</li>
	<li>Где узнать актуальное расписание поликлиники?</li>
	<li>Кто-то видит мои данные кроме меня?</li>
	<li>Как мне отменить запись к врачу?</li>



</ul>






	<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; ">Если здесь нет вашей проблемы напишите её ниже или позвоните в тех. поддержку по номеру  <b>+7 (911) 456-49-45</b></p>
</div>
					</main>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>
</div>
</body>
</html>