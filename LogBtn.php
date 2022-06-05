<?
$login=$_POST['log'];
$password=$_POST['pass'];
$DB=mysqli_connect("localhost","root" ,"","regpol");
mysqli_query($DB, "Set names utf8");
$res=mysqli_query($DB, 'SELECT  Cool_Boy, Login, Password, ID_USERS FROM users WHERE Login="'.$login.'"and password="'.$password.'"');
$USER=mysqli_fetch_assoc($res);
	
if ($USER['Cool_Boy']=="0" ){
	SESSION_NAME("USER");
	SESSION_START();
	if (isset($_SESSION['login'])) {
	$_SESSION['login']='User';};
	header("Location: index.php");
};

if ($USER['Cool_Boy']=="1" ){
	SESSION_NAME("USER");
	SESSION_START();
	if (isset($_SESSION['login'])) {
	$_SESSION['login']='Admin';};
	header("Location: index.php");
	};
	echo "<script>alert('".$_SESSION['login']."')</script>";

?>
