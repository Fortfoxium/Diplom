<?php 
	SESSION_START();
	include "../connection_code_to_data_base.php";
	if($_SESSION['login']=="Admin")
	{
	echo "<html> <head> <Meta http-equiv='refresh' content='0; URL=console/index_admin.php'> </head> </html>";
	};
?>	
	<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8"> 
<title>Официальный сайт поликлинники №2 г. Калининграда: главная</title>
        <link rel="stylesheet" href='../Styles.css'>
</head>
<body>
 <div id="zatemnenie_reg" class="zatemnenie_reg">
      <div id="okno_reg" class="okno_reg">
        <p id="text_reg" class="text_reg">Регистрация</p> <a href="#" class="close">Х</a>
		<div name="polosa" id="polosa" class="polosa"></div>
		<form action="register.php" method="POST">
		 <input type="text" placeholder="Логин" size="20" id="login_reg" class="login_reg" required>
		 <input type="password" placeholder="Пароль" size="20" id="password_reg" class="password_reg" required> 
		 <input type="password" placeholder="Пароль ещё раз" size="20" id="password_reg" class="password_reg" required>
		
        <button id="register_button_reg" class="register_button_reg" type=submit>Зарегистрироваться</button>
		</form>
    </div>
  </div>
	
	 <div id="zatemnenie_log" class="zatemnenie_log">
      <div id="okno_log" class="okno_log">
        <p id="text_log" class="text_log">Авторизация</p> <a href="#" class="close">Х</a>
		<div name="polosa" id="polosa" class="polosa"></div>
		<form action="login.php" method="POST">
			 <input type="text" placeholder="Логин" size="24" name="login_log" id="login_log" class="login_log" required>
			 <input type="password" placeholder="Пароль" size="24" name="password_log" id="password_log" class="password_log" required>
			 <?php 
				$log=$_SESSION['login'];
				$result=mysqli_query($DB, 'SELECT login FROM user WHERE login="'.$log.'"');
				$user=mysqli_fetch_assoc($result);
				 if (empty($user['login'])) {
				echo '<p style="color:red;">Такой пользователь не найден</p>';
				 };
			 ?>
			<button id="button_log" class="button_log" name="button_log" type="submit"> Войти</button>
		</form>
</div>
	
    </div>
  </div>
  </div>
	
	
	<header>
		<div id="header" class="header">
			<h2 style="position:absolute; left:165px; color: #2568a7">Городское бюджетное учреждение здравоохранения калининградской области "Городская поликлиника №2"</h2>
<div id="ForUsers" class="ForUsers" >

				<?php  
				$log=$_SESSION['login'];
				$result=mysqli_query($DB, 'SELECT login FROM user WHERE login="'.$log.'"');
				$user=mysqli_fetch_assoc($result);
				if (!empty($user['login']) and $user['login']!=="Admin"){
					$Big_Penis= ("<a href='exit.php'> Выход </a>| <a href='cabinet.php'> Личный кабинет </a>");
				} else {
					$Big_Penis=("<a href='#zatemnenie_reg'> Регистрация </a> | <a href='#zatemnenie_log'> Вход </a>");
				};
				echo ($Big_Penis);
				?> 
				
				|<a href="For_Pacients/help.php"> Помощь</a> 
			</div>
		<img src='../img/Logo.png' height="100" width="100" id="Logo" class="Logo">
			
		<div id="right_block" class="right_block">
			<div id="search_block" class="search_block">
				 <input type="text" size="40" id="search" class="search">
				 <input type="submit" id="search_button" class="search_button" value="Поиск">

				 <input type="button" id="contacts_button" class="contacts_button" value="Контакты">

				 <p id="telephone_sprav" class="telephone_sprav"> г. Калининград, Ул.Тихая, д.1 Справочная: +7(123)903-32-43</p>
			</div>

		</div>

	</br>
		<div id="Down_header" class="Down_header">
			<ul id="navbar">
					<?php  
						if($_SESSION['role']=="User")
	{
	echo "<li><a href='For_Pacients/zap.php'><h2>Запись к врачу</h2></a></li>";
	};	
	if($_SESSION['role']=="Worker")
	{
	echo "<li><a href='For_Pacients/zap.php'><h2>Расписание</h2></a></li>";
	echo "<li><a href='For_Pacients/zap.php'><h2>Списки пациентов</h2></a></li>";
	};	

						if($_SESSION['role']=="User" || empty($_SESSION['role']))
	{
	echo '
				
				<li><a href="For_Pacients/AboutUs.php"><h2>Об учреждении</h2></a></li>
				<li><a href="For_Pacients/info.php"><h2>Пациентам</h2></a></li>
				<li><a href="#"><h2>Вакансии</h2></a></li>';
	};	
	?> 
			</ul>
		</div>
	</div>

	</header>
	
	<div id="main" class="main">
<div  id="blocks" class="blocks">
	<div id="block1" class="block1"> 
		<h2>Добро пожаловать!</h2>
		Для записи необходимо авторизироваться на сайте, если у вас нет профиля на нашем сайте, то вы можете создать его здесь
		

		
	</div>
	<div id="block2" class="block2"> 
		q
		
	</div>
	</div>
	<div id="NEWS" class="NEWS">
			<H1>НОВОСТИ</H1>
		</br>
		<a href="">Мы выходили гнилого бомжа Васю</a> 
		</br>
		<p>11.11.2031</p></br>
		<a href="">Как не колоть с одного шприца?</a> 
		</br>
		<p>11.11.2031</p></br>
		<a href="">Регистрация</a> </br>
		<p>11.11.2031</p></br>
	</div>
	</div>
	
	<div id="push" class="push">
	</div>

<footer>
	<div id="Info" class="Info">
		<p></br>
			<h2>Связь</h2>
			Email тех. поддержки: animation1973@mail.ru
			</br>
			Адрес компании: г. Калининрад, ул. Громкая, д. 3</br>
			Телефон тех. поддержки: +78005553535</br>
</br></br>
			<h2>Мы в соц. сетях</h2>
			<a href="https://vk.com/rubabaki40kia">VK</a> 
			</br>
			<a href="">Telegram</a> 
			</br>
			<a href="">Одноклассники</a> 
		</p>
	</div>
</footer>
</body>	
</html>