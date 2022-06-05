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
          <li class="pos"><a href="#">Пациент</a></li>
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
    $Str=mysqli_query($DB, "SELECT * FROM pacient");
    $a = 0;
        echo "<table border=10px>";
    While ($Vav=mysqli_fetch_array($Str)){
        Echo "<tr><td><form action='DelBtnPac.php' id=del".++$a." method='POST'><input type='text' id='ID_PACIENT' name='ID_PACIENT' value=".$Vav['ID_PACIENT']."></form></td>";
        Echo "<td style='display: none;'><input type='text' id='ID_PACIENT' form=Upd".$a." name='ID_PACIENT' value=".$Vav['ID_PACIENT']."></td>";
        Echo "<td><form action='UpdBtnPac.php' id=Upd".$a." method='POST'><input type='text' id='FName' name='FName' value=".$Vav["FName"]."></td>";
        Echo "<td><input type='text' id='Name' name='Name' value=".$Vav["Name"]."></td>";
        Echo "<td><input type='text' id='OtchName' name='OtchName' value=".$Vav["OtchName"]."></td>";
        Echo "<td><input type='text' id='Date_Born' name='Date_Born' value=".$Vav["Date_Born"]."></td>";
        Echo "<td><input type='text' id='ID_Cart' name='ID_Cart' value=".$Vav["ID_Cart"]."></td>";
        Echo "<td><input type='text' id='EMail' name='EMail' value=".$Vav["EMail"]."></td>";
        Echo "<td><input type='text' id='Tel' name='Tel' value=".$Vav["Tel"]."></td>";
        Echo "<td><input type='text' id='OMS' name='OMS' value=".$Vav["OMS"]."></td>";
        Echo "<td><input type='text' id='Street' name='Street' value=".$Vav["Street"]."></td>";
        Echo "<td><input type='text' id='Building' name='Building' value=".$Vav["Building"]."></td>";
        Echo "<td><input type='text' id='Pol' name='Pol' value=".$Vav["Pol"]."></td>";
        Echo "<td><input type='text' id='Apart' name='Apart' value=".$Vav["Apart"]."></form></td>";
        Echo "<td><button Type='submit' form=del".$a." id='DelBtnUsl'>Delete</button></td>";
        Echo "<td><button Type='submit' form=Upd".$a." id='changeBtn'>Update</button></td></tr>";
    };
   
    Echo "<tr><td><input type='text' id='ID_Med_Usl' name='ID_Med_Usl'value='Неважна' ></td>";
    Echo "<td><form action='AddBtnPac.php' method='POST'><input type='text' id='FName' name='FName' ></td>";
    Echo "<td><input type='text' id='Name' name='Name' ></td>";
    Echo "<td><input type='text' id='OtchName' name='OtchName' ></td>";
    Echo "<td><input type='text' id='Date_Born' name='Date_Born' ></td>";
    Echo "<td><input type='text' id='ID_Cart' name='ID_Cart' ></td>";
    Echo "<td><input type='text' id='EMail' name='EMail'></td>";
    Echo "<td><input type='text' id='Tel' name='Tel' ></td>";
    Echo "<td><input type='text' id='OMS' name='OMS'></td>";
    Echo "<td><input type='text' id='Street' name='Street' ></td>";
    Echo "<td><input type='text' id='Building' name='Building'></td>";
    Echo "<td><input type='text' id='Pol' name='Pol'></td>";
    Echo "<td><input type='text' id='Apart' name='Apart' ></td>";
    Echo "<td><button Type='submit' id='AddBtnPac'>Add</button></form></td>";
    echo "</table>";
    echo "не, ну, вы реально админ";
} else {
  echo "не, ну, вы реально Fagg";}
?>


</body>
</html>