
<?php
 require '../../Conexion.php';
 $id=$_REQUEST['id'];
 $titulo = $_REQUEST['titulo'];
 $contenido = $_REQUEST['contenido'];
 $fecha = date("d/m/Y");
    
 $data = file_get_contents($_FILES['imagen']['tmp_name']);
    
    //// Los posibles valores que puedas obtener de la imagen son :
    //// $_FILES['imagen']['name'] //nombre del archivo
    //// $_FILES['imagen']['type'] //tipo de archivo
    //// $_FILES['imagen']['tmp_name'] //nombre del archivo de la imagen temporal
   //// $_FILES['imagen']['size'] //tamaño
    
 $imagen = pg_escape_bytea($data);
 
 
 $sql = "UPDATE publicaciones SET titulo='".$titulo."'"
         .",contenido='".$contenido."'"
         .",fecha='".$fecha."'"
         .",imagen='".$imagen."'"
         ." WHERE id=".$id;
 $result = pg_query($conn, $sql);

  if (!$result) {
      $res = "Registro no modificado";
  }  else {
     $res="Publicacion modificada satisfactoriamente!!";   
  }
  pg_close($conn);
  echo($res);
?>