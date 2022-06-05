<?
if(isset($_POST["logReg"]))
{
    $DB=mysqli_connect("localhost","root" ,"","regpol");
    mysqli_query($DB, "Set names utf8");
    $LogReg=$_POST["logReg"];
    $pasreg=$_POST["pasreg"];
    $SQL="INSERT INTO `USERS` (`ID_USERS`, `Login`, `Password`, `Cool_Boy`) VALUES (NULL, '$LogReg', '$pasreg', '0')";
    if($DB->query($SQL)){
    header("Location: index.php");
    };
};

?>