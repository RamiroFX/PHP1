<?php
 require '../../Conexion.php';
 $id=$_GET['id'];
 $sql = "SELECT * FROM publicaciones WHERE id=".$id;
 $result = pg_query($conn, $sql);
 $fila=pg_fetch_row($result);
 $row = pg_unescape_bytea($fila[3]);
 
 
 pg_close($conn);
 error_log('###'.$fila);
 echo $row;




