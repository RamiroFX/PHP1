<?php

$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_error());
}
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = date("Y/m/d");
//$imagenEscapes = $mysqli->real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));
$image = $mysqli->real_escape_string(file_get_contents($_FILES['imagen']['tmp_name']));
//Los posibles valores que puedes obtener de la iamgen son:
//    name, nombre del archivo
//    type, tipo
//    tmp_name, nombre del archivo de la imagen temporal
//    size, tamaño
// prepare and bind
$stmt = $mysqli->prepare("INSERT INTO PUBLICACIONES(TITULO,CONTENIDO,FECHA,IMAGEN)VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssss", $titulo, $contenido, $fecha, $image);
$stmt->execute();
$res = "Contenido no enviado";
if ($stmt) {
    $res = "Publicacion agregada satisfactoriamente";
}
$stmt->close();
$mysqli->close();
echo($res);
?>
