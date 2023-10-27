<?php
	SESSION_START();
	include "../connection_code_to_data_base.php";
	if($_SESSION['role']=="Admin")
	{
	echo "<html> <head> <Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/index.php'> </head> </html>";
	};
	
	function getCabinet(){
		global $DB;
		$query = "SELECT cabinet.id_cabinet, doctor.name_doctor, doctor.fname_doctor, cabinet.fk_rasp, cabinet.name_cabinet, doctor.id_doctor FROM cabinet, doctor where cabinet.id_cabinet=doctor.fk_cabinet";
		$res = mysqli_query($DB, $query);
		return mysqli_fetch_all($res, MYSQLI_ASSOC);
	}

	function getPacient(){
			global $DB;
			$query = "SELECT id_pacient, fname, name, otchname, tel FROM Pacient";
			$res = mysqli_query($DB, $query);
			return mysqli_fetch_all($res, MYSQLI_ASSOC);
		}

function getDates(){
	global $DB;
	$days = array( 1 => "Понедельник" , "Вторник" , "Среда" , "Четверг" , "Пятница" , "Суббота" , "Воскресенье" );
	$query = "SELECT start_day, end_day FROM rasp, cabinet, doctor where doctor.id_doctor=".$_POST['id_cabinet']." and cabinet.fk_rasp=rasp.id_rasp and doctor.fk_cabinet=cabinet.id_cabinet" ;

	$res = mysqli_query($DB, $query);
	$inf = mysqli_fetch_array($res);

	$first= array_search($inf['start_day'],$days);
	$last= array_search($inf['end_day'],$days);
	$data .="<option>Выберите день записи</option>";
foreach (range($first, $last) as $number) {
    echo $number;
	}	
	for ($i = 0; $i <= 29; $i++) 
			{
		 $date_zap = date('Y-m-d', mktime( 0, 0, 0, date("m") , date("d") + $i, date("Y") ));
			$ITS_NUM = date("w",mktime( 0, 0, 0, date("m") , date("d") + $i, date("Y") )); 
			IF($ITS_NUM==0){} else {
		foreach (range($first, $last) as $number) {
			IF($ITS_NUM==$number){
				$data .="<option value='".$date_zap."' >".$date_zap." ".$days[$ITS_NUM]."</option>";
			}
		}
		}
	}
	return $data;
	}

	function getTimes(){
		global $DB;
		$query = "SELECT start_hours, end_hours FROM  rasp, cabinet, doctor where doctor.id_doctor=".$_POST['times']." and cabinet.fk_rasp=rasp.id_rasp and doctor.fk_cabinet=cabinet.id_cabinet" ;
		$res = mysqli_query($DB, $query);
		$inf = mysqli_fetch_array($res);

		$data='';

		$first= date('H:i',strtotime($inf['start_hours']));
		$last= $inf['end_hours'];


		while($first <= $last){	
		$query = "SELECT date_time_zap FROM talon where date_time_zap like '".$_POST['dates']." ".$first."%'";
		$res = mysqli_query($DB, $query);
		if ($res->num_rows > 0 ) {
			} else {
				if (strtotime($first) <= time() && strtotime($_POST['dates'])==strtotime(date("Y-m-d") )) {

				} 
					else
					{
						$data .="<option value='".$first."' >".$first ."</option>";

				}
				
			}
				$first=date('H:i',strtotime($first.' + 15 min'));
	}
	return $data;
}

if(!empty($_POST['id_cabinet'])){
	echo getDates();
	exit;
}

if(!empty($_POST['times'])){
	echo getTimes();
	exit;
}

$Cabinets = getCabinet();

$Pacients = getPacient();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
	<title>Поликлиника №2 г. Калининграда: Записи пациента</title>
        <link rel="stylesheet" href='..\base_of_pages.css'>
<Style>
#block{
	width: 90%;
	height: 400px;
	background-color: ;
}
form  { display: table;      }
form p{ display: table-row;width: 100%  }
label { display: table-cell; }
input { display: table-cell; margin-left: 2%;  margin-top: 2%; width: 250px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
  border: 0.1em solid}
select{ margin-left: 2%;  margin-top: 2%; width: 450px; height: 30px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;font-size: 16px;
  border: 0.1em solid;
   }
button{
	margin-left: 2%;  margin-top: 2%; width: 250px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
label{
	font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 17px;
}
</Style>
	<script src="../jquery-3.6.3.js"></script>
</head>
<body>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php') ?>

<img src='../img/big_img_corona.png' id='big_img' style="margin-bottom: 0" >
						<div id="wrapper">
						<main>
							<div style="padding: 15px;">
								<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; ">
									<b>Важно!</b></br>
								Для онлайн записи к врачу сначала выберите нужный вам кабинет, потом из предложенного списка выберите удобные день и время для вас. 
							</br>
								Если нет времени на которое вы хотите записаться, то оно занято кем-то другим.
								  </p>
							<form method="post" action='proc_zap.php' id="form_add">
							<label for='Cabinet'>Кабинет</label> 
							<select name="Cabinet" id="Cabinet">
								<option disabled selected>Выберите кабинет</option>
								<?php foreach($Cabinets as $Cabinet): ?>
								<option value="<?=$Cabinet['id_doctor']?>"><?=$Cabinet['name_cabinet']?> <?=$Cabinet['name_doctor']?> <?=$Cabinet['fname_doctor']?></option>
								<?php endforeach; ?>
							</select></br>

								<p>
							<label for='rasp'>Дата записи</label> 
							<select name="rasp" id="rasp">
								<option disabled selected>Выберите день записи</option>
							</select></br></p>
							<p>
							<label for='tim'>Время записи</label> 
							<select name="tim" id="tim">
								<option disabled selected>Выберите время записи</option>
							</select></br></p>
							<?php if($_SESSION['role']=="Registrator"){ ?>
								<p><label for='pac' >Пациента </label>
								<input type='text' list="pacient" id="pac"  name="pacient" placeholder="Выберите пациент"></p>
								<datalist  id="pacient">
								<?php foreach($Pacients as $Pacient){
									?>
								<option  value="<?=$Pacient['id_pacient']?>"><?=$Pacient['name']." ".$Pacient['fname']." ".$Pacient['otchname']?></option></br>
							
							<?php } ?>
							</datalist>


							<?php } ?>
							
						</form></br></br>
<button form="form_add" type='submit' name='sub' id="sub" style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; float:left;" >
								<?php if($_SESSION['role']=="Registrator")
								{ echo('Записать'); } 
								else { echo('Записаться'); }?>
							
								</button></br></br></br>
								<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px;">
									<b>Важно!</b></br>
								Чтобы узнать на какое время вы записаны, вы можете перейти в свой личный кабинет -> "Все мои записи" перед вами будет полная история записей в нашей поликлинике. 
							</br>
								Также в личном кабинете есть возможность печать своего талона на запись. Вы также можете попросить распечатать талон в регистратуре нашей поликлиники.
								  </p>
							</div>
						</main>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>

					</div>
<script>
$(function(){
	$('#Cabinet').change(function(){
		var id_cabinet = $(this).val();
		$('#rasp').load('zap.php', {id_cabinet: id_cabinet}, function(){
			$('.rasp-select').fadeIn('slow');
		});
	});
});



$(function(){
	$('#rasp').change(function(){
		var times = $('#Cabinet').val();
		var dates = $('#rasp').val();
		$('#tim').load('zap.php', {times: times, dates: dates}, function(){
			$('.times-select').fadeIn('slow');
		});
	});
});
</script>
	</body>
	</html>