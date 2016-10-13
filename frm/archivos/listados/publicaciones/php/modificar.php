<?php
//# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","manualime");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));
////// Los posible valores que puedes obtener de la imagen son:
//////echo "<BR>".$_FILES["userfile"]["name"];      //nombre del archivo
//////echo "<BR>".$_FILES["userfile"]["type"];      //tipo
//////echo "<BR>".$_FILES["userfile"]["tmp_name"];  //nombre del archivo de la imagen temporal
//////echo "<BR>".$_FILES["userfile"]["size"];      //tamaño
////# Agregamos la imagen a la base de datos
            $sql="update disenhos set nombre='".$nombre."',imagen='".$imagenEscapes."' where codigo=".$id."";
            $ret=$mysqli->query($sql);
            $res="Registro No modificado";
            if($ret==1){
                $res="Registro modificado";
            }
            echo($res);
?>