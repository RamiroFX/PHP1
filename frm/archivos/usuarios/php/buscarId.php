<?php

require '../../../../php/conexion.php';
$id = $_POST['cod_usuario'];

$sql = "SELECT * FROM usuario WHERE id_usuario=" . $id;
$result = mysqli_query($connection, $sql);
$objeto = new stdClass();
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $objeto->mensaje = "Registro encontrado";
    $objeto->id_usuario = $row["id_usuario"];
    $objeto->nombre_usuario = $row["nombre"];
    $objeto->alias_usuario = $row["usuario"];
    $objeto->email_usuario = $row["email"];
} else {
    $objeto->mensaje = "Registro no encontrado";
}
$json= json_encode($objeto);
echo($json);
?>