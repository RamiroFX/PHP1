
<?php

require '../../../../php/conexion.php';
$id = $_REQUEST['id_producto'];
$titulo = $_REQUEST['nombre'];
$contenido = $_REQUEST['descripcion'];
$precio = $_REQUEST['precio'];
//$imagen = $_REQUEST['mosaico'];

$stmt = $connection->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ? WHERE ID_PRODUCTO = ?;");
$stmt->bind_param("ssii", $titulo, $contenido, $precio, $id);
$stmt->execute();
if ($stmt) {
    $res = "Producto modificado satisfactoriamente.";
} else {
    $res = "Registro no modificado.";
}
$connection->close();
echo($res);
?>