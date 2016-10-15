<?php

require '../../../../php/conexion.php';
$id = $_POST['cod_usuario'];

$sql = "SELECT * FROM usuario WHERE id_usuario=" . $id;
$result = mysqli_query($connection, $sql);
$objeto = new stdClass();
if ($result) {
    $row = mysqli_fetch_row($result);
    $objeto->mensaje = "Registro encontrado";
    $objeto->id_usuario = $row[0];
    $objeto->nombre_usuario = $row[1];
    $objeto->alias_usuario = $row[2];
    $objeto->email_usuario = $row[4];
} else {
    $objeto->mensaje = "Registro no encontrado";
}
echo($json);
?>