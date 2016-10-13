<?php

session_start();
$mensaje = "";
if (isset($_SESSION['acceso'])) {
    session_destroy();
    $mensaje = "Sesión cerrada.";
}
$pregunta = new stdClass();
$pregunta->mensaje = $mensaje;
$json = json_encode($pregunta);
echo($json);
?>
