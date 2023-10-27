<?php
$DB = mysqli_connect("localhost", "root", "root", "regpol") or die("Нет соединения с БД");
mysqli_set_charset($DB, "utf8") or die("Не установлена кодировка соединения");

?>