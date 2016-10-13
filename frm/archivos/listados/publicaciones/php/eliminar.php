<?php
//# Conectamos con MySQL
$mysqli=new mysqli("localhost","root","","manualime");
if (mysqli_connect_errno()) {
    die("Error al conectar: ".mysqli_connect_error());
}
$id = $_POST['id'];
            $sql="delete from disenhos where codigo=".$id;
            $ret=$mysqli->query($sql);
            $res="Registro NO eliminado";
            if($ret==1){
                $res="Registro eliminado";
            }
            echo($res);
?>