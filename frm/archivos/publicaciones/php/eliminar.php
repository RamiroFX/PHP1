<?php

require '../../../../php/conexion.php';
$id = $_POST['id'];

$sql = "DELETE FROM publicaciones WHERE id=" . $id;
$result = mysqli_query($connection, $sql);

if (!$result) {
    $res = "Error de coneccion!!";
} else {
    $res = "Publicacion borrado satisfactoriamente!!";
}
mysqli_close($conn);
echo($res);
?>