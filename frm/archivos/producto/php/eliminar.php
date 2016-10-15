<?php

require '../../../../php/conexion.php';
$id = $_POST['id_producto'];

$sql = "DELETE FROM productos WHERE id_producto=" . $id;
$result = mysqli_query($connection, $sql);

if (!$result) {
    $res = "Error de coneccion!!";
} else {
    $res = "Producto borrado satisfactoriamente!!";
}
mysqli_close($connection);
echo($res);
?>