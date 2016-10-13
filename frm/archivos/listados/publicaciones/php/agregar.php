<?php //
//# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","manualime");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$fecha = date("d/m/Y");

$imagenEscapes=$mysqli->real_escape_string(file_get_contents($_FILES["imagen"]["tmp_name"]));
////// Los posible valores que puedes obtener de la imagen son:
//////echo "<BR>".$_FILES["userfile"]["name"];      //nombre del archivo
//////echo "<BR>".$_FILES["userfile"]["type"];      //tipo
//////echo "<BR>".$_FILES["userfile"]["tmp_name"];  //nombre del archivo de la imagen temporal
//////echo "<BR>".$_FILES["userfile"]["size"];      //tamaño
////# Agregamos la imagen a la base de datos

            $sql="insert into publicaciones (titulo,contenido,fecha,imagen) VALUES ('".$titulo."','".$contenido."','".$fecha."','".$imagenEscapes."')";
            $ret=$mysqli->query($sql);
            $res="Registro NO guardado";
            if($ret==1){
                $res="Registro guardado";
            }
            echo($res);
?>