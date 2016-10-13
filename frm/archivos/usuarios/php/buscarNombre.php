<?php

###########buscarNombre.php##############
#debe recibir el nombre de lo registros a mostrar
#conectamos con mysql
$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}
$offset = ((int)($_POST['bpagina'])-1)*10;
$query = "SELECT * FROM usuario WHERE nombre LIKE '%".$_POST['bnombre_usuario']."%' LIMIT 10 OFFSET ".$offset;
$result = $mysqli->query($query);
$tabla = "";
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $tabla = $tabla . "<tr>"
            . "<td>" . $row["id"] . "</td>"
            . "<td>" . $row["nombre"] . "</td>"
            . "</tr>";
}
$pregunta = new stdClass();
$pregunta->mensaje = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
echo($json);
?>