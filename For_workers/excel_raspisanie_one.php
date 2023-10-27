<?php

session_start();

$doc=$_POST["doctor"];
header("Content-type: ../application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Расписание для кабинета.xls");
header("Content-Transfer-Encoding: binary");
echo '<meta charset="UTF-8">';
include "../connection_code_to_data_base.php";
?>
<center> <?php echo("<font face='Times New Roman'><b>Расписание для кабинета</b></font>") ?></center>
<table border="5">
        <tr>
        <th>Кабинет и врач</th>
        <th>Понедельник</th>
        <th>Вторник</th>
        <th>Среда</th>
        <th>Четверг</th>
        <th>Пятница</th>
        <th>Суббота</th>
        <th>Воскресенье</th>
        </tr>
        <?php 

       

 $query = "SELECT doctor.name_doctor, doctor.fname_doctor, doctor.otchname_doctor, cabinet.name_cabinet, rasp.start_hours, rasp.end_hours, rasp.start_day, rasp.end_day FROM rasp, cabinet, doctor WHERE doctor.fk_cabinet=cabinet.id_cabinet and cabinet.fk_rasp=rasp.id_rasp and doctor.id_doctor='".$doc."';" ;
            $res = mysqli_query($DB, $query);

            $days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
    
          while($row = mysqli_fetch_array($res)){
                    $first= array_search($row['start_day'],$days);
            $last= array_search($row['end_day'],$days);
            
             echo "<tr> <td>".$row[0]." ".$row[1]." </br> ".$row[2]." </br> ".$row[3]."</td>";
            if (in_array(1, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td style='background-color:green;'>Выходной</td>"; 
        } 

        if (in_array(2, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td style='background-color:green;'>Выходной</td>"; 
        } 

        if (in_array(3, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td style='background-color:green;'>Выходной</td>"; 
        } 

        if (in_array(4, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td style='background-color:green;'>Выходной</td>"; 
        } 

        if (in_array(5, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td style='background-color:green;'>Выходной</td>"; 
        } 

        if (in_array(6, range($first, $last))) {
                echo  "<td>".$row[4]." - ".$row[5]."</td>";
        } else{
        echo  "<td style='background-color:green;'>Выходной</td>"; 
        } 
        
    echo  "<td style='background-color:green;'>Выходной</td></tr>";
}
                exit("<Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/console/lists_pacient.php'>");
    
?>