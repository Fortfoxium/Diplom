<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
    $ID_Med_Usl=$_POST["ID_Med_Usl"];
    $SQL="DELETE FROM usluga WHERE ID_Med_Usl='$ID_Med_Usl'";
    if($DB->query($SQL)){
    header("Location: usluga.php");
    };
?>