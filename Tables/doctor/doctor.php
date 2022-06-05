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
          <li class="pos"><a href="#">Врачи</a></li>
          <li class="pos"><a href="../pacient/pacient.php">Пациент</a></li>
          <li class="pos"><a href="../usluga/usluga.php">Услуга</a></li>
          <li class="Pos"><a href="../rasp/rasp.php">Расписание</a></li>
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
    $Str=mysqli_query($DB, "SELECT * FROM doctor");
    $a = 0;
        echo "<table border=10px>";
    While ($Vav=mysqli_fetch_array($Str)){
        Echo "<tr><td><form action='DelBtnDoc.php' id=del".++$a." method='POST'><input type='text' id='ID_DOCTOR' name='ID_DOCTOR' value=".$Vav['ID_DOCTOR']."></form></td>";
        Echo "<td style='display: none;'><input type='text' id='ID_DOCTOR' form=Upd".$a." name='ID_DOCTOR' value=".$Vav['ID_DOCTOR']."></td>";
        Echo "<td><form action='UpdBtnDoc.php' id=Upd".$a." method='POST'><input type='text' id='FName_Doc' name='FName_Doc' value=".$Vav["FName_Doc"]."></td>";
        Echo "<td><input type='text' id='Name_Doc' name='Name_Doc' value=".$Vav["Name_Doc"]."></td>";
        Echo "<td><input type='text' id='OtchName_Doc' name='OtchName_Doc' value=".$Vav["OtchName_Doc"]."></td>";
        Echo "<td><input type='text' id='ID_RASP' name='ID_RASP' value=".$Vav["ID_RASP"]."></form></td>";
        Echo "<td><button Type='submit' form=del".$a." id='DelBtnDoc'>Delete</button></td>";
        Echo "<td><button Type='submit' form=Upd".$a." id='changeBtn'>Update</button></td></tr>";
    };
   
    Echo "<tr><td><input type='text' id='ID_DOCTOR' name='ID_DOCTOR'value='Неважна' ></td>";
    Echo "<td><form action='AddBtnDoc.php' method='POST'><input type='text' id='FName_Doc' name='FName_Doc'></td>";
    Echo "<td><input type='text' id='Name_Doc' name='Name_Doc'></td>";
    Echo "<td><input type='text' id='OtchName_Doc' name='OtchName_Doc'></td>";
    Echo "<td><input type='text' id='ID_RASP' name='ID_RASP'></td>";
    Echo "<td><button Type='submit' id='AddBtnDoc'>Add</button></form></td>";
    echo "</table>";
    echo "не, ну, вы реально админ";
} else {
  echo "не, ну, вы реально Fagg";}
?>


</body>
</html>