<?php

require '../../../../php/conexion.php';
$id = $_POST['cod_publicacion'];

$sql = "SELECT * FROM publicaciones WHERE id_publicacion = " . $id;
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_row($result);
$objeto = new stdClass();
$objeto->mensaje = "Registro encontrado";
$objeto->id = $row[0];
$objeto->titulo = $row[1];
$objeto->contenido = $row[2];
$objeto->fecha = $row[3];

$json = json_encode($objeto);
mysqli_close($connection);
echo($json);
?>