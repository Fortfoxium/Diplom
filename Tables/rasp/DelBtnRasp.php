<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
    $ID_RASP=$_POST["ID_RASP"];
    $SQL="DELETE FROM rasp WHERE ID_RASP='$ID_RASP'";
    if($DB->query($SQL)){
    header("Location: rasp.php");
    };
?>