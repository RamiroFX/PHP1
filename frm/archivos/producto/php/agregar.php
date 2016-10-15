<?php

require '../../../../php/conexion.php';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
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
$res = "Contenido no enviado";
if (is_uploaded_file($uploadfile_temporal)) {
    move_uploaded_file($uploadfile_temporal, $uploadfile_nombre);
    $stmt = $connection->prepare("INSERT INTO productos(NOMBRE,DESCRIPCION,PRECIO,IMAGEN)VALUES(?, ?, ?, ?)");
    $stmt->bind_param("ssis", $nombre, $descripcion, $precio, $nombreImagen);
    $stmt->execute();
    $res = "Contenido no enviado";
    if ($stmt) {
        $res = "Producto agregado satisfactoriamente";
    }
    $stmt->close();
    $connection->close();
} else {
    echo "error";
}


echo($res);
?>
