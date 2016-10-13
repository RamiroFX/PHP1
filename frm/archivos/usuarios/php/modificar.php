<?php

$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}

$pass_usuario = $_REQUEST['pass_usuario'];
$nombre_usuario = $_REQUEST['nombre_usuario'];
$email_usuario = $_REQUEST['email_usuario'];
$UPDATE_USUARIO = "UPDATE USUARIO(password, nombre, email)values('" . $pass_usuario . "','" . $nombre_usuario . "','" . $email_usuario . "')";
$ret = $mysqli->query($UPDATE_USUARIO);
$res = "Registro no modificado.";
if ($ret == 1) {
    $res = "Usuario modificado satisfactoriamente";
}
$mysqli->close();
echo($res);
?>
