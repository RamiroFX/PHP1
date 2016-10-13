<?php
 require '../../Conexion.php';
 $id=$_POST['id'];
 
 $sql = "SELECT * FROM publicaciones WHERE id=".$id;
 $result = pg_query($conn, $sql);
 $row = pg_fetch_row($result);
 $imagen = pg_unescape_bytea($row[3]);
 



 
 $objeto = new stdClass();
 $objeto->mensajes ="Registro encontrado";

 
 $objeto->titulo = $row[1];
 $objeto->contenido = $row[2];
 
 error_log("#####".$row[1]);
 
 //$objeto->imagen = $row[3];
 
 $json = json_encode($objeto);
 pg_close($conn);
 echo($json);
?>