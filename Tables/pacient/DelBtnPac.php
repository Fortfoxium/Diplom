<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
    $ID_PACIENT=$_POST["ID_PACIENT"];
    $SQL="DELETE FROM pacient WHERE ID_PACIENT='$ID_PACIENT'";
    if($DB->query($SQL)){
    header("Location: pacient.php");
    };
?>