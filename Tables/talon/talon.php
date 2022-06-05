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
          <li class="Pos"><a href="../rasp/rasp.php">Расписание</a></li>
          <li class="Pos"><a href="../cabinet/cabinet.php">Кабинет</a></li>
          <li class="Pos"><a href="#">Талон</a></li>
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
    $Str=mysqli_query($DB, "SELECT * FROM talon");
    $a = 0;
        echo "<table border=10px>";
   
        Echo "<tr><td>ID талона</td>";
        Echo "<td>Дата записи</td>";
        Echo "<td>Время записи</td>";
        Echo "<td>Дата создания талона</td>";
        Echo "<td>ID кабинета</td>";
        Echo "<td>ID пациента</td>";

    While ($Vav=mysqli_fetch_array($Str)){
      Echo "<tr><td style='display: none;'><form action='Print.php' id=print".++$a." method='POST'><input type='text' id='DateZap' name='DateZap' value=".$Vav["DateZap"]."></td>";
      Echo "<td style='display: none;'><input type='text' id='TimeZap' name='TimeZap' value=".$Vav["TimeZap"]."></td>";
      Echo "<td style='display: none;'><input type='text' id='DATATALON' name='DATATALON' value=".$Vav["DATATALON"]."></td>";
      Echo "<td style='display: none;'><input type='text' id='Cab' name='Cab' value=".$Vav["Cab"]."></td>";
      Echo "<td style='display: none;'><input type='text' id='ID_PACIENT' name='ID_PACIENT' value=".$Vav["ID_PACIENT"]."></form></td>";

        Echo "<td><form action='DelBtnTal.php' id=del".$a." method='POST'><input type='text' id='ID_Talon' name='ID_Talon' value=".$Vav['ID_Talon']."></form></td>";
        Echo "<td style='display: none;'><input type='text' id='ID_Talon' form=Upd".$a." name='ID_Talon' value=".$Vav['ID_Talon']."></td>";
        Echo "<td><form action='UpdBtnTal.php' id=Upd".$a." method='POST'><input type='text' id='DateZap' name='DateZap' value=".$Vav["DateZap"]."></td>";
        Echo "<td><input type='text' id='TimeZap' name='TimeZap' value=".$Vav["TimeZap"]."></td>";
        Echo "<td><input type='text' id='DATATALON' name='DATATALON' value=".$Vav["DATATALON"]."></td>";
        Echo "<td><input type='text' id='Cab' name='Cab' value=".$Vav["Cab"]."></td>";
        Echo "<td><input type='text' id='ID_PACIENT' name='ID_PACIENT' value=".$Vav["ID_PACIENT"]."></form></td>";
        Echo "<td><button Type='submit' form=del".$a." id='DelBtnTal'>Delete</button></td>";
        Echo "<td><button Type='submit' form=Upd".$a." id='changeBtn'>Update</button></td>";
        Echo "<td><button Type='submit' form=print".$a." id='printBtnTal'>Print</button></td></tr>";
    };
   
    Echo "<tr><td><input type='text' id='ID_Med_Usl' name='ID_Med_Usl'value='Неважна' ></td>";
    Echo "<td><form action='AddBtnTal.php' method='POST'><input type='text' id='DateZap' name='DateZap'></td>";
    Echo "<td><input type='text' id='TimeZap' name='TimeZap' ></td>";
    Echo "<td><input type='text' id='DATATALON' name='DATATALON' ></td>";
    Echo "<td><input type='text' id='Cab' name='Cab' ></td>";
    Echo "<td><input type='text' id='ID_PACIENT' name='ID_PACIENT'></td>";
    Echo "<td><button Type='submit' id='AddBtnTal'>Add</button></form></td>";
    echo "</table>";
    echo "не, ну, вы реально админ";
} else {
  echo "не, ну, вы реально Fagg";}

?>


</body>
</html>