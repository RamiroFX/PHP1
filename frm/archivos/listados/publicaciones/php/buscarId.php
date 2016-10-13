<?php
# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","manualime");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
$id = $_POST['id'];
            $sql="select * from publicaciones where id=".$id;
            $ret=$mysqli->query($sql);
            $row=$ret->fetch_array(MYSQLI_ASSOC);
            
$objeto = new stdClass();
$objeto->mensaje = "Resgistro encontrado";
$objeto->titulo = $row["titulo"];
$objeto->contenido = $row["contenido"];
$json = json_encode($objeto);
echo($json);
?>