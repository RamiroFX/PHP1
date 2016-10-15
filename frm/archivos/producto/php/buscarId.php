<?php

require '../../../../php/conexion.php';
$id = $_POST['id_producto'];
$sql = "SELECT * FROM productos WHERE id_producto = " . $id;
$result = mysqli_query($connection, $sql);
$objeto = new stdClass();
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $objeto->mensaje = "Registro encontrado";
    $objeto->id = $row["id_producto"];
    $objeto->nombre = $row["nombre"];
    $objeto->descripcion = $row["descripcion"];
    $objeto->precio = $row["precio"];
    $objeto->imagen = $row["imagen"];
} else {
    $objeto->mensaje = "Registro no encontrado";
}
$json = json_encode($objeto);
mysqli_close($connection);
echo($json);
?>
