<?php

$host = "localhost";
$user = "root";
$pass_db = "";
$db_name = "php1";
$connection = mysqli_connect($host, $user, $pass_db, $db_name);
if ($connection === false) {
    return mysqli_connect_error();
}
?>
