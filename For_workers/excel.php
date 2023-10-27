<?php

session_start();

$Date=$_POST["DateTimeZap"];
$doc=$_POST["doctor"];
header("Content-type: ../application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=список пациентов на ".$Date.".xls");
header("Content-Transfer-Encoding: binary");
echo '<meta charset="UTF-8">';
include "../connection_code_to_data_base.php";
?>
<center> <?php echo("<font face='Times New Roman'><b>Cписок пациентов на ".$Date."</b></font>") ?></center>
<table border='1'>

<tr>
<th><font face="Times New Roman">Фамилия пациента</font></th><th><font face="Times New Roman">Имя пациента</font></th><th><font face="Times New Roman">Отчество пациента</font></th><th><font face="Times New Roman">Дата рождения пациента</font></th><th><font face="Times New Roman"><font face="Times New Roman">Электронная почта пациента</font></th><th>Телефон пациента</font></th><th><font face="Times New Roman">Пол пациента</font></th><th><font face="Times New Roman"><font face="Times New Roman">Время записи пациента</font></th><th><font face="Times New Roman">Подпись</font></th>
</tr>

<?php
$SQL_list= mysqli_query($DB, "SELECT pacient.fname, pacient.name, pacient.otchname, pacient.date_born, pacient.email, pacient.tel, pacient.oms, pacient.pol, talon.date_time_zap FROM pacient, talon, doctor WHERE pacient.id_pacient=talon.fk_pacient and doctor.id_doctor=talon.fk_doctor and doctor.id_doctor='".$doc."' and talon.date_time_zap LIKE '".$Date."%';");
 if (mysqli_num_rows($SQL_list)>0){
        foreach ($SQL_list as $row){
            echo "
            <tr>
            <td>".$row["fname"]."</td>
            <td>".$row["name"]."</td>
            <td>".$row["otchname"]."</td>
            <td>".$row["date_born"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["tel"]."</td>";
            if ($row["pol"]==1){
            echo "
            <td>муж.</td>";
            } else {
            echo "
            <td>жен.</td>";
            }
            echo "
            <td>".mb_substr($row["date_time_zap"],11,-1,"UTF-8")."</td>
            <td>                 </td>
            </tr>
            ";
        }
    } else {
                exit("<Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/console/lists_pacient.php'>");
    }
?>