<?php

$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}

$login_usuario = $_REQUEST['login_usuario'];
$token = 'E45Y-P34CY';
$pass_usuario = md5($_REQUEST['password_usuario']);
$password = hash('sha256', $pass_usuario . $token);
$stmt = $mysqli->prepare("SELECT usuario, password FROM USUARIO WHERE USUARIO = ? AND PASSWORD = ? ");
$stmt->bind_param("ss", $login_usuario, $password);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result( $login_usuario, $password);

session_start();
$_SESSION['acceso'] = "false";
if ($stmt->num_rows == 1) {
    $_SESSION['login_usuario'] = $_REQUEST['login_usuario'];
    $_SESSION['acceso'] = "true";
}
$pregunta = new stdClass();
$pregunta->acceso = $_SESSION['acceso'];
$json = json_encode($pregunta);
$stmt->close();
$mysqli->close();
echo ($json);
?>
