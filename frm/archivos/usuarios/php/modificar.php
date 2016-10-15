<?php

require '../../../../php/conexion.php';

$id_usuario = $_REQUEST['cod_usuario'];
$token = 'E45Y-P34CY';
$pass_usuario = md5($_REQUEST['password_usuario']);
$password = hash('sha256', $pass_usuario . $token);
$nombre_usuario = $_REQUEST['nombre_usuario'];
$email_usuario = $_REQUEST['email_usuario'];
$stmt = $connection->prepare("UPDATE USUARIO SET password = ?, nombre = ?, email = ? WHERE ID_USUARIO = ?;");
$stmt->bind_param("sssi", $password, $nombre_usuario, $email_usuario, $id_usuario);
$stmt->execute();
if ($stmt) {
    $res = "Usuario modificado satisfactoriamente";
} else {
    $res = "Registro no modificado.";
    mysqli_error($connection);
}
$connection->close();
echo($res);
?>
