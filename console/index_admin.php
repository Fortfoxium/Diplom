<?php

session_start();
	if($_SESSION['role']!=="Admin")
		{
			echo "<html>
					<head>
						<Meta http-equiv='refresh' content='0; URL=../index.php'>
					</head>
				  </html>";
		};
				$table=$_SESSION['table'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
	<title>Консоль админа</title>
        <link rel="stylesheet" href='Styles.css'>
        <style type="text/css">
        #chart-container {
    width: 500px;
    height: 450px;
}
</style>
</head>
<body>
	<style type="text/css">
	form  { display: table;      }
form p{ display: table-row;width: 100%  }
label { display: table-cell; }
textarea{
	font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
                margin-left:5px;
  border: 0.1em solid;resize: horizontal;display: table-cell;
}
input { display: table-cell;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;

  border: 0.1em solid}
select{ margin-top: 2%; width: 100% ; height: 100%;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;font-size: 16px;
  border: 0.1em solid;
   }
button{
	 margin-top: 2%; width: 340px; height: auto; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
label{
	font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 17px;
}

</style>
<form action='delete.php' method='POST' id='del'  onsubmit="return confirm('Вы уверены что хотите удалить записи?');"></form>
<form action='update.php' method='POST' id='upd' onsubmit="return confirm('Вы уверены что хотите изменить записи?');"></form>
<ul class="menu" name="menu" id="menu">
	<li class="str" name="str" id="str"><font face="arial"> <a href="../exit.php" onclick="return confirm('Вы уверены что хотите выйти?');"> Выйти </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=cabinet"> Таблица "cabinet" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=talon"> Таблица "talon" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=doctor"> Таблица "doctor" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=user"> Таблица "user" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=role"> Таблица "role" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=rasp"> Таблица "rasp" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="tables.php?tab=pacient"> Таблица "pacient" </a></font></li>
	<li class="str" name="str" id="str"> <font face="arial"> <a href="#otchet" onclick="show_otchet()"> Отчет кол-во посещений врача за период </a></font></li>
</ul>

 <div id="otchet" style="display:none; width: 70%; height: auto; 
  border: 0.1em solid;margin-top:  30px;background-color: white;margin-left: 230px; padding: 5%">
 Сформировать отчёт</br>
<select class="selection" id="othets">
	<option value="" disabled selected >Выберите вид отчета</option>
	<option value="1">Месячный</option>
	<option value="2">Квартальный</option>
	<option value="3">Годовой</option>
</select>

<select class="selection" id="months" style="display:none;">
	<option value="" disabled selected >Выберите месяц</option>
	<?php 
	$month_example = array( 1 => "январь" , "февраль" , "март" , "апрель" , "май" , "июнь" , "июль" , "август" , "сентябрь" , "октябрь" , "ноябрь" , "декабрь");
	$mycop_date="2022-07";
	while ($mycop_date <= date("Y-m")){
		echo "<option value='".$mycop_date."'>".$mycop_date."</option>";
		$mycop_date=date('Y-m',strtotime($mycop_date.' + 1 month'));
	} 
	?>
</select>

<select class="selection" id="quarters" style="display:none;">
	<option value="" disabled selected >Выберите квартал</option>
		<?php 	
		$mycop_date="2022-09";
	while ($mycop_date <= date("Y-m")){
		$mycop=$mycop_date;
		$mycop_date=date('Y-m',strtotime($mycop_date.' + 3 month'));
		$mycop_date_val=date('Y-m-d',strtotime($mycop_date.' - 1 day'));
		echo "<option value='".$mycop_date_val."'>".$mycop."-".$mycop_date."</option>";
	} 
	?>
</select>

<select class="selection" id="years" style="display:none;">
	<option value="" disabled selected >Выберите год</option>
		<?php $mycop_date="2022";
	while ($mycop_date <= date("Y")){
		echo "<option value='".$mycop_date."'>".$mycop_date."</option>";
		$mycop_date=date('Y',strtotime($mycop_date.' + 1 year'));
	} 
		echo "<option value='".date("Y")."'>".date("Y")."</option>";
	?>
</select>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>

    <div id="chart-container">
        <canvas id="graphCanvas"  width="250" height="200"></canvas>
    </div>


<script>
 		$('#quarters').change(function () {
     
            showGraph_qurtal();
        });
		

		function showGraph_qurtal()
        {

		var quarter = $('#quarters').val();
            {
                $.post("data_quartal.php",{quarter: quarter},
                function (data)
                {
                    console.log(data);
                     var quarter = [];
                    var count = [];

                    for (var i in data) {
                        quarter.push(data[i].quarter);
                        count.push(data[i].count);
                    }



                    var chartdata = {
                        labels: quarter
                    ,
                        datasets:[

                            {
                                label: "Кол-во записей в квартал",
                                backgroundColor: '#red',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#red',
                                hoverBorderColor: '#666666',
                                data: count
                            },
                         


                        ]
                    };


  const ctx = document.getElementById('graphCanvas');

if(window.bar != undefined)
	window.bar.destroy();
                   window.bar = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
						options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
}
                    });
                });
            }
        }



        </script>

<script>
 		$('#years').change(function () {
     
            showGraph_year();
        });
		

		function showGraph_year()
        {

		var year = $('#years').val();
            {
                $.post("data1.php",{year: year},
                function (data)
                {
                    console.log(data);
                     var month = [];
                    var count = [];
                    var cab = [];

                    for (var i in data) {
                        month.push(data[i].month);
                        count.push(data[i].count);
                        cab.push(data[i].cab);
                    }



                    var chartdata = {
                        labels: month
                    ,
                        datasets:[

                            {
                                label: cab,
                                backgroundColor: '#red',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#red',
                                hoverBorderColor: '#666666',
                                data: count
                            },
                         


                        ]
                    };


  const ctx = document.getElementById('graphCanvas');

if(window.bar != undefined)
	window.bar.destroy();
                   window.bar = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
						options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
}
                    });
                });
            }
        }



        </script>

    <script>
        $('#months').change(function () {
     
            showGraph_month();
        });

		function showGraph_month()
        {

		var month = $('#months').val();
            {
                $.post("data.php",{month: month},
                function (data)
                {
                    console.log(data);
                     var date = [];
                    var pos = [];

                    for (var i in data) {
                        date.push(data[i].date);
                        pos.push(data[i].pos);
                    }

                    var chartdata = {
                        labels: date,
                        datasets: [
                            {
                                label: 'Записи в поликлинику',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#red',
                                hoverBorderColor: '#666666',
                                data: pos
                            }
                        ]
                    };


  const ctx = document.getElementById('graphCanvas');

if(window.bar != undefined)
	window.bar.destroy();
                   window.bar = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata,
						options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
}
                    });
                });
            }
        }



        </script>


<script>
	function show_otchet() {
		document.getElementById("otchet").style.display="block";
	}
	let othet = document.querySelector('#othets'),
    month = document.querySelector('#months'),
    quarter = document.querySelector('#quarters'),
    year = document.querySelector('#years');

othet.addEventListener('change', function(){
  if (othet.value === '1') {
    year.style.display = 'none';
    quarter.style.display = 'none';
    month.style.display = 'inline-block';
  } else if (othet.value === '2') {
    year.style.display = 'none';
    month.style.display = 'none';
    quarter.style.display = 'inline-block';
  } else if (othet.value === '3') {
    year.style.display = 'inline-block';
    month.style.display = 'none';
    quarter.style.display = 'none';
  }
});

	</script>
 </div>
 
 <div id="table_cabinet" class="table_cabinet">
      <div id="okno_table_cabinet" class="okno_table_cabinet">
			<p id="text_table_cabinet" class="text_table_cabinet"><?php echo('Таблица '.$table) ?></p> <a href="#" class="close">Х</a>
			<div name="polosa" id="polosa" class="polosa"></div>
			<table border="1" align="center">
			<?php
				include "../connection_code_to_data_base.php"; 
				$names_res=mysqli_query($DB, 'SHOW COLUMNS FROM '.$table);
				$inc=mysqli_query($DB, 'SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = `'.$table.'` ORDER BY `auto_increment`  DESC LIMIT 1');

				// list all the table in database
				 $result = mysqli_query($DB, "show tables");
				 // show all the field with type, lenght,description of a specific table
				 $result = mysqli_query($DB, "DESCRIBE ".$table);
				 // show a specific tables row 
				 $result = mysqli_query($DB, "SELECT * FROM ".$table);
				 if (mysqli_num_rows($result)>0){
					$information = mysqli_fetch_array($result,MYSQLI_ASSOC);
				 	$firstLine="<tr>";
				 	foreach ($information as $names => $v)
					{
				 	  $htmlka .="<th>".$names."</th>";
				 	  if (mb_substr($names,0,2,"UTF-8")=='id'){
				 	  $firstLine .="<td ><p>".$v."</p></td>";
				 	  $firstLine .="<td style='display:none;'><input style='width:100%' disabled type='text' form='upd' name='".$names."[".$v."]' value='".$v."'></td>";
				 	  $firstLine .="<td style='display:none;'><input style='width:100%' disabled type='text' form='del' name='iddel[".$v."]' value='".$v."'></td>";
				 	  $number = $v;
				 	} else {
				 	  if (mb_substr($names,0,2,"UTF-8")=='fk'){
				 	 		$s=substr($names,3);
				 	  		$spis = mysqli_query($DB, "SELECT * FROM ".$s);
				 	  		$firstLine .="<td><select style='height:28.19px' form='upd' name='".$names."[".$number."]' >";
				 	  		$firstLine .="<option  selected='selected'>Не выбран</option>";
				 	  		$num_of_text= mysqli_num_fields($spis);
				 	  		while ($info = mysqli_fetch_array($spis))
							{
						 	  	$firstLine .="<option " ;
						 	  	if ($info['id_'.$s]==$v){
									$firstLine .="selected='selected' value=".$info['id_'.$s].">" ;
									for ($i = 1; $i <= $num_of_text; $i++) 
									{
									    $firstLine .="".$info[$i]." ";
									}
						 	  	} else {
									$firstLine .=" value=".$info['id_'.$s].">" ;
									for ($i = 1; $i <= $num_of_text; $i++) 
									{
									    $firstLine .="".$info[$i]." ";
									}
								}
								$firstLine .="</option>";
				 	 	 	}

				 	  		$firstLine .="</select></td>";
				 		} else {
							if (mb_substr($names,0,9,"UTF-8")=='date_time'){
								$firstLine .="<td><input style='width:180px; height:25px' name='".$names."[".$number."]' type='datetime-local' form='upd' size='10' value='".$v."'></td>";
							} else {
								if (mb_substr($names,0,4,"UTF-8")=='date'){
								$firstLine .="<td><input style='width:110px; height:25px' name='".$names."[".$number."]' type='date' form='upd' size='10' value='".$v."'></td>";
								} else {
									$firstLine .="<td><textarea cols='17' rows='1' name='".$names."[".$number."]' type='text' form='upd' > ".$v."</textarea></td>";
								}
								
							}
				 	  	
				 	  	}
				 	}
					}
					$htmlka.="<th style='width:1%'>Изменить</th><th style='width:1%'>Удалить</th></tr>".$firstLine."<td>";
					foreach($information as $names => $v){
					if (mb_substr($names,0,2,"UTF-8")=='id'){
				 	  $htmlka .="<input style='width:50%' style='text-align:right;' name='checkbox[".$v."]' form='upd' type='checkbox'></td><td><input name='checkbox[".$v."]' form='del' type='checkbox'></td></tr>";}
				 	}



				 	while($information = mysqli_fetch_array($result,MYSQLI_ASSOC)){
				   		$htmlka.="<tr>";
				   		foreach($information as $names => $v){
				     		if (mb_substr($names,0,2,"UTF-8")=='id'){
				 	  $htmlka .="<td ><p>".$v."</p></td>";
				 	  $htmlka .="<td style='display:none;'><input  disabled type='text' form='upd' name='".$names."[".$v."]' value='".$v."'></td>";
				 	  $htmlka .="<td style='display:none;'><input  disabled type='text' form='del' name='iddel[".$v."]' value='".$v."'></td>";
				 	   $number = $v;
				 	} else {
				 	  if (mb_substr($names,0,2,"UTF-8")=='fk'){
				 	 		$s=substr($names,3);
				 	  		$spis = mysqli_query($DB, "SELECT * FROM ".$s);
				 	  		$htmlka .="<td><select style='height:28.19px' form='upd' name='".$names."[".$number."]'>";
				 	  		$htmlka .="<option  selected='selected'>не выбран</option>";
				 	  		$num_of_text= mysqli_num_fields($spis);
				 	  		while ($info = mysqli_fetch_array($spis))
							{
						 	  	$htmlka .="<option " ;
						 	  	if ($info['id_'.$s]==$v){
									$htmlka .="selected='selected' value=".$info['id_'.$s].">" ;
									for ($i = 1; $i <= $num_of_text; $i++) {
									    $htmlka .="".$info[$i]." ";
									}
						 	  	} else {
									$htmlka .=" value=".$info['id_'.$s].">" ;
									for ($i = 1; $i <= $num_of_text; $i++) {
									    $htmlka .="".$info[$i]." ";
									}
								}
								$htmlka .="</option>";
				 	 	 	}

				 	  		$htmlka .="</select></td>";
				 		} else {
							if (mb_substr($names,0,9,"UTF-8")=='date_time'){
								$htmlka .="<td><input style='width:180px; height:25px' name='".$names."[".$number."]' type='datetime-local' form='upd'  value='".$v."'></td>";
							} else {
								if (mb_substr($names,0,4,"UTF-8")=='date'){
								$htmlka .="<td><input style='width:110px; height:25px' name='".$names."[".$number."]' type='date' form='upd'  value='".$v."'></td>";
								} else {
									$htmlka .="<td><textarea cols='17' rows='1' name='".$names."[".$number."]' type='text' form='upd' > ".$v."</textarea></td>";
								}
								
							}
				 	  	
				 	  	}
				 	}

					}	
				   		foreach($information as $names => $v){
					if (mb_substr($names,0,2,"UTF-8")=='id'){
				 	  $htmlka .="<td><input style='width:100%' style='text-align:right;' name='checkbox[".$v."]' form='upd' type='checkbox'></td><td><input name='checkbox[".$v."]' form='del' type='checkbox'></td>";}
				 	}
					}
				 	echo $htmlka;
					}


// Добавление
				 $result = mysqli_query($DB, "show tables");
				 // show all the field with type, lenght,description of a specific table
				 $result = mysqli_query($DB, "DESCRIBE ".$table);
				 // show a specific tables row 
				 $result = mysqli_query($DB, "SELECT * FROM ".$table);
				 if (mysqli_num_rows($result)>0){
					$information = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$lastLine="<tr> <form method='POST' action='insert.php'>";	
				 	foreach ($information as $names => $v)
					{
				 	  if (mb_substr($names,0,2,"UTF-8")=='id'){
				 	 	 $lastLine .="<td><p>АВТО</p></td>";
				 	} else {
				 	  if (mb_substr($names,0,2,"UTF-8")=='fk'){
				 	 	$s=substr($names,3);
				 	  	$spis = mysqli_query($DB, "SELECT * FROM ".$s);
				 	  	$lastLine .="<td><select style='height:28.19px' id='new[]' class='new[]' name='new[]' required>";
				 	  	$num_of_text= mysqli_num_fields($spis);
				 	  	while ($info = mysqli_fetch_array($spis))
							{
						 	    $lastLine .="<option " ;
								$lastLine .=" value='".$info['id_'.$s]."'>";
								for ($i = 1; $i <= $num_of_text; $i++) 
								{
									$lastLine .="".$info[$i]." ";
								}
								$lastLine .="</option>";
							}
				 	  		$lastLine .="</select></td>";
				 		} 
				 		else 
							{
							if (mb_substr($names,0,9,"UTF-8")=='date_time'){
								$lastLine .="<td><input style='width:180px; height:25px' id='new[]' class='new[]' name='new[]' required size='10' value='' type='datetime-local'></td>";
							} else {
								if (mb_substr($names,0,4,"UTF-8")=='date'){
								$lastLine .="<td><input style='width:110px; height:25px' type='date' id='new[]' class='new[]' name='new[]' required type='text' size='10' value=''></td>";
								} else {
				 	  		$lastLine .="<td><textarea cols='17' rows='1' id='new[]' class='new[]' required name='new[]' type='text' > </textarea></td>";
								}
								
							}
				 	  	
				 	  	}
				 	}
					}
				}
				 	echo $lastLine;
				echo("<td colspan='2'><button style='width:120px; border-radius:0px;' type=submit>Добавить</button></td>");
				echo("</form> </tr>");
				echo("<tr><td colspan='2'> <button style='width:120px; border-radius:0px;' form='upd' name='changes' type=submit>Изменить выделенное</button></td>");
				echo("<td colspan='2'> <button style='width:120px; border-radius:0px;' form='del' name='changes' type=submit>Удалить выделенное</button></td>");
				echo("</tr>");
			?>
			</table>
    </div>
  </div>

</body>

</html>