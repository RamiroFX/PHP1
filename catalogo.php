<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Catalogo de productos</title>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" href="./js/scripts.js"></script>
    </head>
    <body>
        <header>
            <h1>Catalogo de Productos</h1>
        </header>
        <section>
            <?php
            require 'php/conexion.php';
            $result = mysqli_query($connection, "SELECT * FROM PRODUCTOS");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                <div class="producto">
                    <center>
                        <img src="./frm/archivos/producto/imagenes/<?php echo $row['imagen']; ?>"><br>
                        <span><?php echo $row['nombre']; ?></span><br>
                        <a href="./productos.php?id=<?php echo $row['id']; ?>">
                            <button class="btn btn-primary btn-sm">Detalle</button></a>
                    </center>
                </div>
                <?php
            }
            ?>
        </section>
    </body>
</html>