
<?php

require '../../../../php/conexion.php';
$id = $_REQUEST['cod_publicacion'];
$titulo = $_REQUEST['titulo'];
$contenido = $_REQUEST['contenido'];
$fecha = date("d/m/Y");
//$imagen = $_REQUEST['mosaico'];

$stmt = $connection->prepare("UPDATE publicaciones SET titulo = ?, contenido = ?, fecha = ? WHERE ID_PUBLICACION = ?;");
$stmt->bind_param("sssi", $titulo, $contenido, $fecha, $id);
$stmt->execute();
if ($stmt) {
    $res = "Publicacion modificada satisfactoriamente.";
} else {
    $res = "Registro no modificado.";
}
$connection->close();
echo($res);
?>