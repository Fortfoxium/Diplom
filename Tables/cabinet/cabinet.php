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
          <li class="Pos"><a href="#">Кабинет</a></li>
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
    $Str=mysqli_query($DB, "SELECT * FROM cabinet");
    $a = 0;
        echo "<table border=10px>";
    While ($Vav=mysqli_fetch_array($Str)){
        Echo "<tr><td><form action='DelBtnCab.php' id=del".++$a." method='POST'><input type='text' id='CAB' name='CAB' value=".$Vav['CAB']."></form></td>";
        Echo "<td style='display: none;'><input type='text' id='CAB' form=Upd".$a." name='CAB' value=".$Vav['CAB']."></td>";
        Echo "<td><form action='UpdBtnCab.php' id=Upd".$a." method='POST'><input type='text' id='Name_Cab' name='Name_Cab' value=".$Vav["Name_Cab"]."></td>";
        Echo "<td><input type='text' id='ID_Doctor' name='ID_Doctor' value=".$Vav["ID_Doctor"]."></td>";
        Echo "<td><input type='text' id='ID_MED_USL' name='ID_MED_USL' value=".$Vav["ID_MED_USL"]."></form></td>";
        Echo "<td><button Type='submit' form=del".$a." id='DelBtnCab'>Delete</button></td>";
        Echo "<td><button Type='submit' form=Upd".$a." id='changeBtn'>Update</button></td></tr>";
    };
   
    Echo "<tr><td><input type='text' id='CAB' name='CAB'value='Неважна' ></td>";
    Echo "<td><form action='AddBtnCab.php' method='POST'><input type='text' id='Name_Cab' name='Name_Cab'></td>";
    Echo "<td><input type='text' id='ID_Doctor' name='ID_Doctor'></td>";
    Echo "<td><input type='text' id='ID_MED_USL' name='ID_MED_USL'></td>";
    Echo "<td><button Type='submit' id='AddBtnUsl'>Add</button></form></td>";
    echo "</table>";
    echo "не, ну, вы реально админ";
} else {
  echo "не, ну, вы реально Fagg";}
?>


</body>
</html>