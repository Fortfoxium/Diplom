<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
    $ID_Talon=$_POST["ID_Talon"];
    $SQL="DELETE FROM talon WHERE ID_Talon='$ID_Talon'";
    if($DB->query($SQL)){
    header("Location: talon.php");
    };
?>