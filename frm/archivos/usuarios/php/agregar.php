<?php

$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}

$alias_usuario = $_REQUEST['alias_usuario'];
$token = 'E45Y-P34CY';
$pass_usuario = md5($_REQUEST['password_usuario']);
$password = hash('sha256', $pass_usuario . $token);
$nombre_usuario = $_REQUEST['nombre_usuario'];
$email_usuario = $_REQUEST['email_usuario'];
$stmt = $mysqli->prepare("INSERT INTO USUARIO(usuario, password, nombre, email)VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssss", $alias_usuario, $password, $nombre_usuario, $email_usuario);
$stmt->execute();
$res = "Usuario no creado";
if ($stmt) {
    $res = "Usuario agregado satisfactoriamente";
}
$stmt->close();
$mysqli->close();
echo($res);
?>
