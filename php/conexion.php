<?php

$host = "localhost";
$user = "root";
$pass_db = "";
$db_name = "php1";

$conexion = new mysqli($host, $user, $pass_db) or die(mysql_error());
mysql_select_db($db_name) or die("Cannot select DB");
?>
