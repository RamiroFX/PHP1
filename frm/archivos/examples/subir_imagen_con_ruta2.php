<?php

$ruta = "imagenes/";
$uploadfile_temporal = $_FILES['fichero']['tmp_name'];
$uploadfile_nombre = $ruta . $_FILES['fichero']['name'];

if (is_uploaded_file($uploadfile_temporal)) {
    move_uploaded_file($uploadfile_temporal, $uploadfile_nombre);
    echo "El nombre temporal: " . $_FILES['fichero']['tmp_name'];
    echo "El nombre: " . $_FILES['fichero']['name'];
} else {
    echo "error";
}
$directorio = opendir("imagenes/");
while ($ficheros = readdir($directorio)) {
    $url = "imagenes/" . $ficheros;
    if ($url != "imagenes/." and $url != "imagenes/..") {
        echo "<img src='" . $url . "'>";
    }    
}
?>
