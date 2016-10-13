<?php
 require '../../php/conexion.php';
 $id=$_POST['cod_usuario'];
 
 $sql = "SELECT * FROM usuario WHERE id=".$id;
 $result = pg_query($conn, $sql);
 $row = pg_fetch_row($result);
 $objeto = new stdClass();
 $objeto->mensajes ="Registro encontrado";
 $objeto->id_usuario = $row[1];
 $objeto->alias_usuario = $row[2];
 $objeto->password_usuario = $row[3];
 $objeto->repetir_password = $row[3];
 $objeto->nombre_usuario = $row[4];
 $objeto->email_usuario = $row[5];
 
 $json = json_encode($objeto);
 pg_close($conn);
 echo($json);
?>