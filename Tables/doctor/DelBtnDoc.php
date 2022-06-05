<?
    include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
    $ID_Med_Usl=$_POST["ID_DOCTOR"];
    $SQL="DELETE FROM doctor WHERE ID_DOCTOR='$ID_DOCTOR'";
    if($DB->query($SQL)){
    header("Location: doctor.php");
    };
?>