<?php
	SESSION_START();
	include "../connection_code_to_data_base.php";
	if($_SESSION['role']!=="Registrator")
	{
	echo "<html> <head> <Meta http-equiv='refresh' content='0; URL=chttp://websiteofpoliklinika/index.php'> </head> </html>";
	};

 function getCabinet(){
    global $DB;
    $query = "SELECT cabinet.id_cabinet, doctor.name_doctor, doctor.fname_doctor, cabinet.fk_rasp, cabinet.name_cabinet, doctor.id_doctor FROM cabinet, doctor where cabinet.id_cabinet=doctor.fk_cabinet";
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
/*
function getZap(){
  global $DB;
 $query = "SELECT talon.id_talon, pacient.fname, pacient.name, pacient.otchname FROM talon, pacient, doctor WHERE talon.date_time_zap like '".$_POST['dates']."%' AND talon.fk_pacient=pacient.id_pacient and talon.fk_doctor=doctor.id_doctor and talon.fk_doctor=".$_POST['cab'].";" ;
  $res = mysqli_query($DB, $query) or die("Не отправил");
  $inf = mysqli_fetch_array($res) or die("Не сделал массив");

 $sql = "SELECT talon.id_talon, pacient.fname, pacient.name, pacient.otchname FROM talon, pacient, doctor WHERE talon.date_time_zap like '".$_POST['dates']."%' and talon.fk_pacient=pacient.id_pacient and talon.fk_doctor=doctor.id_doctor and talon.fk_doctor=".$_POST['cab'].";";
$result = mysqli_query($sql, $DB);
$data .="<option >".$result."</option>";
while($row = mysqli_fetch_array($result))
{
    $data .="<option value='".$row['id_talon']."' >".$row['fname']." ".$row['name']." ".$row['otchname']."</option>"; // выводим
}
 while($r = mysqli_fetch_array($res)):
  $data .="<option value='".$r['id_talon']."' >".$r['fname']." ".$r['name']." ".$r['otchname']."</option>";
endwhile;

$data .= "SELECT talon.id_talon, pacient.fname, pacient.name, pacient.otchname FROM talon, pacient, doctor WHERE talon.date_time_zap like '".$_POST['dates']."%' AND talon.fk_pacient=pacient.id_pacient and talon.fk_doctor=doctor.id_doctor and talon.fk_doctor=".$_POST['cab'].";" ;
foreach ($inf as $number =>$p) {
  $data .="<option value='".$p."' >'".$p." ".$p." ".$p."</option>";
}
$data .="<option value='".$p."' >'".$p." ".$p." ".$p."</option>";
  return $data;
  }*/

function getTimes(){
    global $DB;
    $query = "SELECT talon.id_talon, pacient.fname, pacient.name, pacient.otchname FROM talon, pacient, doctor WHERE talon.date_time_zap like '".$_POST['dates']."%' AND talon.fk_pacient=pacient.id_pacient and talon.fk_doctor=doctor.id_doctor and talon.fk_doctor=".$_POST['times'].";" ;
    $res = mysqli_query($DB, $query);
    mysqli_fetch_all($res, MYSQLI_ASSOC);
    $data='';
foreach($res as $Cabinet){
   $data .="<option value='".$Cabinet['id_talon']."' >".$Cabinet['fname']." ".$Cabinet['name']." ".$Cabinet['otchname']."</option>";
}
/*foreach ($inf as $number =>$p) {
while($row = mysqli_fetch_assoc($res))
{


    }

foreach ($inf as $number =>$p) {
  $data .="<option value='".$p."' >'".$number=>name." ".$p." ".$p."</option>";
}*/

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

?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
	<title>Удаление записи к врачу</title>
        <link rel="stylesheet" href='../base_of_pages.css'>
</head>
<body>

  <script src="../jquery-3.6.3.js"></script>
<style type="text/css">
  form  { display: table;      }
form p{ display: table-row;width: 100%  }
label { display: table-cell; }
input { display: table-cell;  margin-top: 2%; width: 335px; height: 30px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
  border: 0.1em solid}
select{ margin-top: 2%; width: 340px; height: 30px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;font-size: 16px;
  border: 0.1em solid;
   }
button{
   margin-top: 2%; width: 340px; height: 30px;
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
label{
  font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 17px;
}

</style>
<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php') ?>

    <main>
              <div style="padding: 15px;">
                <p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; ">
                  <b>Важно!</b></br>
                Для удаления онлайн записи к врачу сначала выберите нужный вам кабинет, потом из предложенного списка выберите день и время записи пациента.
              </br>
                Выберите пациента и нажмите кнопку удалить.
                  </p>
              <form method="post" action='proc_zap.php' id="form_add">
 <p><label for='Cabinet'>Кабинет записи</label>
                  <select name="Cabinet" id="Cabinet">
                <option disabled selected>Выберите кабинет</option>
                <?php foreach($Cabinets as $Cabinet): ?>
                <option value="<?=$Cabinet['id_doctor']?>"><?=$Cabinet['name_cabinet']?> <?=$Cabinet['name_doctor']?> <?=$Cabinet['fname_doctor']?></option>
                <?php endforeach; ?>
              </select></br> </p>

               <p>
              <label for='rasp'>Дата записи</label>
              <select name="rasp" id="rasp">
                <option disabled selected>Выберите день записи</option>
              </select></br></p>
              <p>

              <p>
                <label for='pac'>Записанный пациент</label>
              <select name="pac" id="pac" class="pac-select">
                <option disabled selected>Выберите пациента</option>
              </select></br>
              </p>


            </form></br></br>
<button form="form_add" type='submit' name='sub' id="sub" style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; float:left;" >
                <?php
                if($_SESSION['role']=="Registrator")
                { echo('Удалить запись'); }
              ?>

                </button></br></br></br>
               <!-- <p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px;">
                  <b>Важно!</b></br>
                Чтобы узнать на какое время вы записаны, вы можете перейти в свой личный кабинет -> "Все мои записи" перед вами будет полная история записей в нашей поликлинике.
              </br>
                Также в личном кабинете есть возможность печать своего талона на запись. Вы также можете попросить распечатать талон в регистратуре нашей поликлиники.
                  </p> -->
              </div>
            </main>


<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>

    </div>
  </div>
  <script>

$(function(){
  $('#Cabinet').change(function(){
    var id_cabinet = $(this).val();
    $('#rasp').load('delete.php', {id_cabinet: id_cabinet}, function(){
      $('.rasp-select').fadeIn('slow');
    });
  });
});

$(function(){
  $('#rasp').change(function(){
    var times = $('#Cabinet').val();
    var dates = $('#rasp').val();
    $('#pac').load('delete.php', {times: times, dates: dates}, function(){
      $('.pac-select').fadeIn('slow');
    });
  });
});
/*
$('#rasp').change(function(){
$.ajax({
  url: '/For_workers/delete.php',
  method: 'post',
  dataType: 'html',
  data: {dates: $(this).val(),
         cab: $('#Cabinet').val()},
  success: function(data){
    $('.zap-select').fadeIn('slow');
  }
});
});*/

</script>
  </body>
</html>