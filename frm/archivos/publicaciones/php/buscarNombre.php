<?php

//require '../../../php/conexion.php';
$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}
$sql = "SELECT id, titulo, contenido, fecha FROM publicaciones WHERE upper(titulo) like upper('%" . $_POST['btitulo'] . "%')";

$result = $mysqli->query($sql);
$tabla = "";
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $tabla = $tabla . "<tr>"
            . "<td>" . $row["id"] . "</td>"
            . "<td>" . $row["titulo"] . "</td>"
            . "<td>" . $row["contenido"] . "</td>"
            . "<td>" . $row["fecha"] . "</td>"
            . "</tr>";
}
$pregunta = new stdClass();
$pregunta->mensajes = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
$mysqli->close();
echo($json);
?>
