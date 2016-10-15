<?php

require '../../../../php/conexion.php';

$sql = "SELECT id_producto, nombre, descripcion, precio FROM productos WHERE upper(nombre) like upper('%" . $_POST['bnombre'] . "%')";

$result = mysqli_query($connection, $sql);
$tabla = "";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $tabla = $tabla . "<tr>"
            . "<td>" . $row["id_producto"] . "</td>"
            . "<td>" . $row["nombre"] . "</td>"
            . "<td>" . $row["descripcion"] . "</td>"
            . "<td>" . $row["precio"] . "</td>"
            . "</tr>";
}
$pregunta = new stdClass();
$pregunta->mensaje = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
$connection->close();
echo($json);
?>
