<?php

require '../../../../php/conexion.php';
$id = $_POST['cod_publicacion'];
$sql = "SELECT * FROM publicaciones WHERE id_publicacion = " . $id;
$result = mysqli_query($connection, $sql);
$objeto = new stdClass();
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $objeto->mensaje = "Registro encontrado";
    $objeto->id = $row["id_publicacion"];
    $objeto->titulo = $row["titulo"];
    $objeto->contenido = $row["contenido"];
    $objeto->fecha = $row["fecha"];
    $objeto->imagen = $row["imagen"];
} else {
    $objeto->mensaje = "Registro no encontrado";
}
$json = json_encode($objeto);
mysqli_close($connection);
echo($json);
?>
