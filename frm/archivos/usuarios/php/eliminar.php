<?php
 require '../../Conexion.php';
 $id=$_POST['cod_usuario'];
 
 $sql = "DELETE FROM usuarios WHERE codigo=".$id;
 $result = pg_query($conn, $sql);

  if (!$result) {
      $res = "Error de coneccion!!";
  }  else {
     $res="Usuario borrado satisfactoriamente!!";   
  }
  pg_close($conn);
  echo($res);
?>