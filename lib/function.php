<?php
#функция для создания простой таблицы (массив заголовков, подключение, текст запроса)
function CreateTable($zag,$connect,$sql){
    echo "
    <table border='1'>
    <thead>
    <tr>";
    for ($i=0;$i<=count($zag)-1;$i++)
    echo "<th>$zag[$i]</th>";
    echo "</tr>
    </thead>
    ";
   
    $query=mysqli_query($connect,$sql);
    while ($row=mysqli_fetch_array($query))
    {
    echo "<tr>";
    for ($i=0;$i<=count($zag)-1;$i++) echo "<td>$row[$i]</td>";
    echo "</tr>"; 
    }
    echo "</table>";
}

#отрисовка сложной таблицы    
function DrawTable($connect,$sql,$name,$rusname,$titles,$needselect,$sqlselect,$columns,$kolvozap,$pages){


echo "
<table>
<thead>
<tr>";

for ($i=0;$i<=count($titles)-1;$i++)
{
echo "<th>$titles[$i]</th>";
}

echo "<th>Изменить</th>";
echo "<th>Удалить</th>";

echo "</tr>
</thead>
";

$_SESSION['sql_excel']=$sql." order by $columns[0]";

$query=mysqli_query($connect,$sql);
$count=mysqli_num_rows($query);


if ($kolvozap!='all'){
$start=$kolvozap*($pages-1);
$pages2=$pages;} else {
  $start=1;
  $kolvozap=$count;  
}



$sql.=" order by $columns[0] LIMIT $start,$kolvozap";


$query=mysqli_query($connect,$sql);


while($row=mysqli_fetch_row($query)){#основной цикл отрисовки таблицы
echo "<tr>"; #отрисовка строки таблицы
    for ($i=0;$i<=count($titles)-1;$i++){ #отрисовка каждой ячейки таблицы
       
               if ($needselect[$i]==0){ #если обычный текст
                      if ($i==0){ #если id, то блокируем возможность редактирования ячейки
                      echo "<td>  <input type='text' class='text_table' id='$columns[$i][$row[0]]' value='$row[$i]' disabled </td>";
                      } else {
                      echo "<td>  <input type='text' class='text_table' id='$columns[$i][$row[0]]' value='$row[$i]' </td>";
                      }


               } else{ #для select
               
               echo "<td><select id='$columns[$i][$row[0]]'>";

               $query2=mysqli_query($connect,$sqlselect[$i]);

                   while($row2=mysqli_fetch_row($query2)){
                         if ($row2[1]==$row[$i]){
                         echo "<option selected value='$row2[0]'>$row2[1]</option>";
                         } else 
                         echo "<option value='$row2[0]'>$row2[1]</option>";
                   }

               echo "</select></td>";

               }



    }
   
echo "<td><button class='btn' onclick=Operate($row[0],`change`)>Изменить</button></td>";
echo "<td><button class='btn' onclick=Operate($row[0],`delete`)>Удалить</button></td>";

echo "</tr>";
}


echo "</table>
";

$pages=ceil($count/$kolvozap);
$_SESSION['last_page']=$pages;


if ($pages!=1){
    echo "
    <div class='pagination'>
    <ul>
    ";

for ($i=1;$i<=$pages;$i++)
if ($i==$pages2)
echo "<li  class='active'><a onclick='Operate($i,`paginator`)'>$i</a></li>";
else
echo "<li><a onclick='Operate($i,`paginator`)'>$i</a></li>";


echo "</ul>
</div>";

}

}




?>