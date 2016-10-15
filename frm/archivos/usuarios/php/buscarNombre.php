<?php

require '../../../../php/conexion.php';
$offset = ((int) ($_POST['bpagina']) - 1) * 10;
$query = "SELECT * FROM usuario WHERE nombre LIKE '%" . $_POST['bnombre_usuario'] . "%' LIMIT 10 OFFSET " . $offset;
$result = mysqli_query($connection, $query);
$pregunta = new stdClass();
$tabla = "";
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tabla = $tabla . "<tr>"
                . "<td>" . $row["id_usuario"] . "</td>"
                . "<td>" . $row["nombre"] . "</td>"
                . "</tr>";
    }
    $pregunta->mensaje = "Datos encontrados";
} else {
    $pregunta->mensaje = "Datos no encontrados";
}
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
echo($json);
?>