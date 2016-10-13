<?php
 require '../../Conexion.php';
 $id=$_POST['id'];
 
 $sql = "DELETE FROM publicaciones WHERE id=".$id;
 $result = pg_query($conn, $sql);

  if (!$result) {
      $res = "Error de coneccion!!";
  }  else {
     $res="Publicacion borrado satisfactoriamente!!";   
  }
  pg_close($conn);
  echo($res);
?>