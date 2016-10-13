<?php

$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];
$asunto = $_REQUEST['asunto'];
$email = $_REQUEST['email'];
$telefono = $_REQUEST['telefono'];
$celular = $_REQUEST['celular'];
$mensaje = $_REQUEST['mensaje'];
$fecha = date("d/m/Y");
$hora = date("H:i:s");
$UPDATE_USUARIO = "insert into mensajes(
        nombre, apellido, asunto, email, telefono, celular, mensaje, 
        respondido, fecha, hora) 
        VALUES 
        ('" . $nombre . "', '" . $apellido . "','" . $asunto . "','" . $email . "','" . $telefono . "','" . $celular . "',
            '" . $mensaje . "','pendiente','" . $fecha . "','" . $hora . "')";
$ret = $mysqli->query($UPDATE_USUARIO);
$res = "Mensaje No enviado";
if ($ret == 1) {
    $res = "Mensaje enviado satisfactoriamente. Gracias por escribirnos: En breve nos comunicaremos contigo";
}
$mysqli->close();
echo($res);
?>
