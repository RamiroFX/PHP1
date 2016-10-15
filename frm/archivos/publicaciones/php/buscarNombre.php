<?php

require '../../../../php/conexion.php';

$sql = "SELECT id_publicacion, titulo, contenido, fecha FROM publicaciones WHERE upper(titulo) like upper('%" . $_POST['btitulo'] . "%')";

$result = mysqli_query($connection, $sql);
$tabla = "";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $tabla = $tabla . "<tr>"
            . "<td>" . $row["id_publicacion"] . "</td>"
            . "<td>" . $row["titulo"] . "</td>"
            . "<td>" . $row["contenido"] . "</td>"
            . "<td>" . $row["fecha"] . "</td>"
            . "</tr>";
}
$pregunta = new stdClass();
$pregunta->mensaje = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
$connection->close();
echo($json);
?>
