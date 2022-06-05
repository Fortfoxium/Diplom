<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Таблица "Услуга"</title>
    <link rel="stylesheet" href="../../style.css">
  </head>
  <body>
    <ul id="navbar">
      <li><a href="../../index.php">Главная</a></li>
      <li><a href="#">Таблицы</a>
        <ul class="Spis">
          <li class="pos"><a href="../doctor/doctor.php">Врачи</a></li>
          <li class="pos"><a href="../pacient/pacient.php">Пациент</a></li>
          <li class="pos"><a href="../usluga/usluga.php">Услуга</a></li>
          <li class="Pos"><a href="#">Расписание</a></li>
          <li class="Pos"><a href="../cabinet/cabinet.php">Кабинет</a></li>
          <li class="Pos"><a href="../talon/talon.php">Талон</a></li>
        </ul>
      </li>
    </ul>
</br>
<?
SESSION_NAME("USER");
SESSION_START();
if($_SESSION['login']=='Admin'){ 
    include_once("../../Data/connection.php");
        mysqli_query($DB, "Set names utf8");
    $Str=mysqli_query($DB, "SELECT * FROM Rasp");
    $a = 0;
        echo "<table border=10px>";
    While ($Vav=mysqli_fetch_array($Str)){
        Echo "<tr><td><form action='DelBtnRasp.php' id=del".++$a." method='POST'><input type='text' id='ID_RASP' name='ID_RASP' value=".$Vav['ID_RASP']."></form></td>";
        Echo "<td style='display: none;'><input type='text' id='ID_RASP' form=Upd".$a." name='ID_RASP' value=".$Vav['ID_RASP']."></td>";
        Echo "<td><form action='UpdBtnRasp.php' id=Upd".$a." method='POST'><input type='text' id='DAYS_START' name='DAYS_START' value=".$Vav["DAYS_START"]."></td>";
        Echo "<td><input type='text' id='DAYS_END' name='DAYS_END' value=".$Vav["DAYS_END"]."></td>";
        Echo "<td><input type='text' id='HOURS_START' name='HOURS_START' value=".$Vav["HOURS_START"]."></td>";
        Echo "<td><input type='text' id='HOURS_END' name='HOURS_END' value=".$Vav["HOURS_END"]."></form></td>";
        Echo "<td><button Type='submit' form=del".$a." id='DelBtnUsl'>Delete</button></td>";
        Echo "<td><button Type='submit' form=Upd".$a." id='changeBtn'>Update</button></td></tr>";
    };
   
    Echo "<tr><td><input type='text' id='ID_RASP' name='ID_RASP'value='Неважна' ></td>";
    Echo "<td><form action='AddBtnRasp.php' method='POST'><input type='text' id='DAYS_START' name='DAYS_START' ></td>";
    Echo "<td><input type='text' id='DAYS_END' name='DAYS_END'></td>";
    Echo "<td><input type='text' id='HOURS_START' name='HOURS_START'></td>";
    Echo "<td><input type='text' id='HOURS_END' name='HOURS_END'></td>";
    Echo "<td><button Type='submit' id='AddBtnRasp'>Add</button></form></td>";
    echo "</table>";
    echo "не, ну, вы реально админ";
} else {
  echo "не, ну, вы реально Fagg";}
?>


</body>
</html>