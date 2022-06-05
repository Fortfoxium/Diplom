<?
  include_once("../../Data/connection.php");
    mysqli_query($DB, "Set names utf8");
    $CAB=$_POST["CAB"];
    $SQL="DELETE FROM cabinet WHERE CAB='$CAB'";
    if($DB->query($SQL)){
    header("Location: cabinet.php");
    };
?>