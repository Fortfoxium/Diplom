<?php
    SESSION_START();
$login=$_SESSION['login'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$otchname=$_POST['otchname'];
$name_doctor=$_POST['name_doctor'];
$fname_doctor=$_POST['fname_doctor'];
$otchname_doctor=$_POST['otchname_doctor'];
$date_talon=$_POST['date_talon'];
$date_time_zap=$_POST['date_time_zap'];

require_once "..\lib\dompdf\autoload.inc.php";
use Dompdf\Dompdf;
include "../connection_code_to_data_base.php";

$result=mysqli_query($DB, 'SELECT p.name, p.fname, p.otchname, p.street, p.building, p.apart FROM user u, pacient p WHERE u.fk_pacient=p.id_pacient and u.login="'.$login.'"');
$fio=mysqli_fetch_row($result);

$html="

<html lang=ru>
<head>
<!DOCTYPE html>
<meta http-equiv=Content-Type content='text/html; charset=UTF-8'>

<style>


 p.MsoNormal, li.MsoNormal, div.MsoNormal
    {margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:0cm;
    line-height:107%;
    font-size:11.0pt;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
    {margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:36.0pt;
    line-height:107%;
    font-size:11.0pt;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
    {margin-top:0cm;
    margin-right:0cm;
    margin-bottom:0cm;
    margin-left:36.0pt;
    margin-bottom:.0001pt;
    line-height:107%;
    font-size:11.0pt;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
    {margin-top:0cm;
    margin-right:0cm;
    margin-bottom:0cm;
    margin-left:36.0pt;
    margin-bottom:.0001pt;
    line-height:107%;
    font-size:11.0pt;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
    {margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:36.0pt;
    line-height:107%;
    font-size:11.0pt;
p.a, li.a, div.a
    {mso-style-name:Ñòèëü;
    mso-style-link:'Ñòèëü Çíàê';
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:0cm;
    text-align:center;
    line-height:107%;
    font-size:26.0pt;
    font-weight:bold;}
span.a0
    {mso-style-name:'Ñòèëü Çíàê';
    mso-style-link:Ñòèëü;
    font-weight:bold;}
.MsoPapDefault
    {margin-bottom:8.0pt;
    line-height:107%;}
@page WordSection1
    {size:595.3pt 841.9pt;
    margin:2.0cm 42.55pt 2.0cm 65.2pt;}
div.WordSection1
    {page:WordSection1;}
 ol
    {margin-bottom:0cm;}
ul
    {margin-bottom:0cm;}

body{
    font-family: DejaVu Sans;
};
</style>

</head>

<body lang=RU>

<div class=WordSection1>

<p class=MsoNormal><span style='font-size:10.0pt;line-height:107%;color:black'>Минздрав РФ                           </span><span
style='font-size:9.5pt;line-height:107%;
color:black'>Код формы по ОКУД ____</span><span style='font-size:10.0pt;
line-height:107%;color:black'><br>
наименование                    </span><span style='font-size:9.5pt;line-height:
107%;color:black'>Медицинская документация</span><span style='font-size:10.0pt;line-height:107%;color:black'><br>
учрежд.                                     </span><span style='font-size:9.5pt;
line-height:107%;color:black'>Форма № 025-4/у-88                            <br>
                                                   Утверждена МЗ СССР <br>
                                                              12 мая 1988</span></p>

<p class=MsoNormal style='margin-left:70.8pt'><b><span style='font-size:12.0pt;
line-height:107%;color:black'>ТАЛОН</span></b></p>

<p class=MsoNormal><b><span style='
color:black'>                        На прием к врачу</span></b></p>

<p class=MsoListParagraphCxSpFirst style='margin-left:18.0pt;text-indent:-18.0pt'><span
style='font-size:10.0pt;line-height:107%;
color:black'>1.<span style='font:7.0pt 'DejaVu Sans''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:107%;
color:black'>ФИО: ".$fio[0]." <br>
".$fio[1]."  ".$fio[2]." </u></span></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-indent:-18.0pt'><span
style='font-size:10.0pt;line-height:107%;
color:black'>2.<span style='font:7.0pt '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:107%;
color:black'>Адрес амбулаторного больного<br>
<u>Ул.  ".$fio[3]."  д. ".$fio[4]." кв. ".$fio[5]."</u></span></p>



<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-indent:-18.0pt'><span
style='font-size:10.0pt;line-height:107%;
color:black'>3.<span style='font:7.0pt'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:107%;
color:black'>Явиться </span><u><span lang=EN-US style='font-size:10.0pt;
line-height:107%;color:blackspan></u><u><span
style='font-size:10.0pt;line-height:107%;
color:black'> </span></u><u><span lang=EN-US style='font-size:10.0pt;
line-height:107%;color:black'></span></u><u><span
style='font-size:10.0pt;line-height:107%;
color:black'> ".$date_time_zap."</span></u><u><span lang=EN-US style='font-size:10.0pt;
line-height:107%;color:black'></span></u><u><span
style='font-size:10.0pt;line-height:107%;
color:black'></span></u><u><span lang=EN-US style='font-size:10.0pt;
line-height:107%;color:black'></span></u></p>

<p class=MsoListParagraphCxSpMiddle style='margin-left:18.0pt;text-indent:-18.0pt'><span
style='font-size:10.0pt;line-height:107%;
color:black'>4.<span style='font:7.0pt 'DejaVu Sans''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span style='font-size:10.0pt;line-height:107%;
color:black'>К врачу </span><u><span style='font-size:10.0pt;line-height:107%;
color:black'>".$name_doctor." ".$fname_doctor." ".$otchname_doctor."</span></u></p>


<p class=MsoNormal style='margin-left:106.2pt'><span style='font-size:10.0pt;
line-height:107%;color:black'>Подпись врача ________</span></p>

<p class=MsoNormal style='margin-left:106.2pt'><span style='font-size:10.0pt;
line-height:107%;color:black'>Выдан</span><span
lang=EN-US style='font-size:10.0pt;line-height:107%;
color:black'>:</span><u><span lang=EN-US style='font-size:10.0pt;line-height:
107%;color:black'> </span></u><u><span
style='font-size:10.0pt;line-height:107%;
color:black'>".$date_talon."</span></u><span style='font-size:10.0pt;line-height:
107%;color:black'> </span></p>

</div>

";

$dompdf = new Dompdf();
//дефолтный шрифт - dejavu sans, т.к. он поддерживает кириллицу

//даём возможность читать внешние ссылки (для отображения картинок извне)
$dompdf->set_option('isRemoteEnabled', true);
//запихиваем html-ку в преобразователь
$dompdf->loadHtml($html);
//ставим A4 вертикально
$customPaper = array(0,0,360,360);
$dompdf->set_paper($customPaper);
// Render the HTML as PDF - рендерим
$dompdf->render();
// Output the generated PDF to Browser
$dompdf->stream('Запись на '.$date_time_zap.'.pdf',array('Attachment'=>0))

?>

