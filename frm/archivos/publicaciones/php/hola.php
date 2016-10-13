<?php

require '../../Conexion.php';
    
    $query = pg_query($conn, "SELECT imagen FROM publicaciones WHERE id = 1");
$row   = pg_fetch_row($query);
$imagen = pg_unescape_bytea($row[0]);

header("Content-type: image/jpeg");
echo $imagen;
?>

