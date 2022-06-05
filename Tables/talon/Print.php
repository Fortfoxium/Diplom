<?
	$DateZap = $_REQUEST['DateZap'];
	$TimeZap = $_REQUEST['TimeZap'];
	$DATATALON = $_REQUEST['DATATALON'];
	$Cab = $_REQUEST['Cab'];
	$ID_PACIENT = $_REQUEST['ID_PACIENT'];
require_once 'Classes/PHPExcel.php';
$excel = new PHPExcel();
$excel->setActiveSheetIndex(0)
    ->setCellValue('A1', $DateZap)
    ->setCellValue('A2', $TimeZap)
    ->setCellValue('A3', $DATATALON)
    ->setCellValue('A4', $Cab)
    ->setCellValue('A5', $ID_PACIENT);
$excel = PHPExcel_IOFactory::createWriter($excel, 'Excel5');




    $excel->save('talon'.date("d-m-y").'.xls');

	header("Location: talon.php");
?>