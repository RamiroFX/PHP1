<?php

###########buscarNombre.php##############
#debe recibir el nombre de lo registros a mostrar
#conectamos con mysql
$mysqli = new mysqli("localhost", "root", "", "php1");
if (mysqli_connect_errno()) {
    die("Error al conectar: " . mysqli_connect_error());
}
//$fecha_inicio = $_POST['desde_fecha'];
//$fecha_fin = $_POST['hasta_fecha'];
//$fecha_inicio = date("Y/m/d");
//$date=date_create("2013-03-15");

$fecha_inicio = date_create($_POST['desde_fecha']);
$fecha_fin = date_create($_POST['hasta_fecha']);
if ($stmt = $mysqli->prepare("SELECT * FROM publicaciones WHERE fecha BETWEEN ? and ? ")) {
    /*
      Binds variables to prepared statement
      i    corresponding variable has type integer
      d    corresponding variable has type double
      s    corresponding variable has type string
      b    corresponding variable is a blob and will be sent in packets
     */
    $stmt->bind_param("ss", date_format($fecha_inicio, "Y/m/d"), date_format($fecha_fin, "Y/m/d"));
    /* execute query */
    $stmt->execute();
    /* Get the result */
    $result = $stmt->get_result();
    /* Get the number of rows */
    $num_of_rows = $result->num_rows;
    $tabla = "";
    while ($row = $result->fetch_assoc()) {
        $tabla = $tabla . "<tr>"
                . "<td>" . $row["id"] . "</td>"
                . "<td>" . $row["titulo"] . "</td>"
                . "<td>" . $row["contenido"] . "</td>"
                . "<td>" . $row["fecha"] . "</td>"
                . "</tr>";
    }
    /* free results */
    $stmt->free_result();
    /* close statement */
    $stmt->close();
}
$mysqli->close();
///////
$pregunta = new stdClass();
if ($num_of_rows > 0) {
    $pregunta->mensaje = "Datos encontrados";
} else {
    $pregunta->mensaje = "No se encontraron datos";
}
$pregunta->contenido = $tabla;
$json = json_encode($pregunta);
echo($json);
?>