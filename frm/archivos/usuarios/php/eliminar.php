<?php

require '../../../../php/conexion.php';
$id = $_POST['cod_usuario'];

$stmt = $connection->prepare("DELETE FROM usuario WHERE id_usuario = ?;");
$stmt->bind_param("i", $id);
$stmt->execute();
if ($stmt) {
    $res = "Usuario eliminado satisfactoriamente";
} else {
    $res = "Registro no eliminado.";
    mysqli_error($connection);
}
mysqli_close($connection);
echo($res);
?>