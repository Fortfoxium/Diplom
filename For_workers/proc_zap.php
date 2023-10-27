<?php SESSION_START(); include "../connection_code_to_data_base.php";
$id_talon=$_POST['pac'];

$query = "DELETE FROM talon WHERE `talon`.`id_talon` =".$id_talon.";";
echo $query;
$res = mysqli_query($DB, $query);

exit("<Meta http-equiv='refresh' content='0; URL=http://websiteofpoliklinika/For_workers/delete.php'>");
?>