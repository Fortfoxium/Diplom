<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> Главная </title>
    <link rel="stylesheet" href="./Style.css">
  </head>
 
  <body>
  
<?

SESSION_NAME("USER");
	SESSION_START();
	?>
    <ul id="navbar">
      <li><a href="#">Главная</a></li>
      <li><a href="#">Пользователь</a>
      <ul class="Spis">
          <li class="pos"><a href="#oknoLog">Вход</a></li>
          <li class="pos"><a href="#oknoreg">Регистрация</a></li>
        </ul></li>
      <li><a href="#">Таблицы</a>
        <ul class="Spis">
          <li class="pos"><a href="tables/doctor/doctor.php">Врачи</a></li>
          <li class="pos"><a href="tables/pacient/pacient.php">Пациент</a></li>
          <li class="pos"><a href="tables/usluga/usluga.php">Услуга</a></li>
          <li class="Pos"><a href="tables/rasp/rasp.php">Расписание</a></li>
          <li class="Pos"><a href="tables/cabinet/cabinet.php">Кабинет</a></li>
          <li class="Pos"><a href="tables/talon/talon.php">Талон</a></li>
        </ul>
      </li>
    </ul>

    <div id="oknoLog">
      <a href="#" class="close">X</a>
      <h2 style="margin:0; color:black;">Вход</h2>
	<form action="LogBtn.php" method="POST" >
   		 <input type="text" style="border-radius:0px;" id="log" name="log"></BR></BR>
		<input type="text" style="border-radius:0px;" id="pass" name="pass">
		</BR></BR>
   		 <button Type="submit" Style="border: outset 3px #F5F5F5;"> Войти</button>
</form><br>
    </div>

    <div id="oknoreg">
      <a href="#" class="closereg">X</a>
      <h2 style="margin:0; color:black;">Регистрация</h2>
	<form action="RegBtn.php" method="POST" >
   		 <input type="text" style="border-radius:0px;" id="logReg" name="logReg"></BR></BR>
		<input type="text" style="border-radius:0px;" id="pasreg" name="pasreg">
		</BR></BR>
   		 <button Type="submit" Style="border: outset 3px #F5F5F5;"> Войти</button>
</form><br>
    </div>

</body>
</html>