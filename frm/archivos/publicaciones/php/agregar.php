<?php

require '../../../../php/conexion.php';

$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = date("Y/m/d");
//$image = $connection->real_escape_string(file_get_contents($_FILES['imagen']['tmp_name']));
//Los posibles valores que puedes obtener de la iamgen son:
//    name, nombre del archivo
//    type, tipo
//    tmp_name, nombre del archivo de la imagen temporal
//    size, tamaño
$ruta = "../imagenes/";
$nombreImagen= $_FILES['imagen']['name'];
$uploadfile_temporal = $_FILES['imagen']['tmp_name'];
$uploadfile_nombre = $ruta . $nombreImagen;

if (is_uploaded_file($uploadfile_temporal)) {
    move_uploaded_file($uploadfile_temporal, $uploadfile_nombre);
    $stmt = $connection->prepare("INSERT INTO PUBLICACIONES(TITULO,CONTENIDO,FECHA,IMAGEN)VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $titulo, $contenido, $fecha, $nombreImagen);
    $stmt->execute();
    $res = "Contenido no enviado";
    if ($stmt) {
        $res = "Publicacion agregada satisfactoriamente";
    }
    $stmt->close();
    $connection->close();
} else {
    echo "error";
}


echo($res);
?>
