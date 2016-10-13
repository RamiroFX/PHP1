<?php
########## buscarNombre.php ##########
# debe recibir el nombre de los registros a mostrar
# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","manualime");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
# Buscamos la imagen a mostrar
$result=$mysqli->query("SELECT * FROM publicaciones WHERE titulo like '%".$_POST[btitulo_publicacion]."%'");
$tabla="";
while($row=$result->fetch_array(MYSQLI_ASSOC)){
     $tabla = $tabla."<tr>"
                                ."<td>".$row["id"]."</td>"
                                ."<td>".$row["titulo"]."</td>"
                                ."</tr>";
}
 
$pregunta = new stdClass();
$pregunta->mensaje = "Datos encontrados";
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
echo($json);
?>