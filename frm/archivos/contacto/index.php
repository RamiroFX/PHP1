<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="../../../img/logo.png"/>
        <title>Formulario de contacto</title>
    </head>
    <body>
        <div id="confirmar"></div>
        <div id="buscar"></div>
        <div id="panelPrograma" class="panel panel-primary">
            <form id="formPrograma" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Nombre</span>
                    </div>
                    <div class="col-md-3">
                        <input id="nombre" name="nombre" type="text" 
                               class="form-control input-sm" placeholder="Nombre">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Apellido</span>
                    </div>
                    <div class="col-md-3">
                        <input id="apellido" name="apellido" type="text" 
                               class="form-control input-sm" placeholder="Apellido">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Asunto</span>
                    </div>
                    <div class="col-md-3">
                        <input id="asunto" name="asunto" type="text" 
                               class="form-control input-sm" placeholder="Asunto">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Email</span>
                    </div>
                    <div class="col-md-3">
                        <input id="email" name="email" type="text" 
                               class="form-control input-sm" placeholder="tuemail@correo.com">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Teléfono</span>
                    </div>
                    <div class="col-md-3">
                        <input id="telefono" name="telefono" type="text" 
                               class="form-control input-sm" placeholder="Teléfono">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Celular</span>
                    </div>
                    <div class="col-md-3">
                        <input id="celular" name="celular" type="text" 
                               class="form-control input-sm" placeholder="Celular">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"> 
                        <span>Mensaje</span>
                    </div>
                    <div class="col-md-3">
                        <textarea id="mensaje" name="mensaje" type="text" 
                                  class="form-control input-sm" 
                                  placeholder="Mensaje" rows="5" cols="10"></textarea>
                    </div>
                </div>
                <div class="panel-footer centrado">
                    <button id="botonEnviar" type="submit" class="btn btn-primary btn-sm">Enviar</button>
                    <button id="botonLimpiar" type="button" class="btn btn-primary btn-sm">Limpiar</button>
                    <button id="botonSalir" type="button" class="btn btn-primary btn-sm">Salir</button>
                </div>
            </form>
        </div>
        <div id="mensajes" class="">Mensajes del sistema</div>
        <script src="../../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            $("#botonEnviar").on('click', function() {
                enviarMensaje();
            });
            $("#botonSalir").on('click', function() {
                location.href = "../../../menu.html";
            });
            $("#botonLimpiar").on('click', function() {
                limpiarCampos();
            });
        </script>

        <?php
        if (isset($_REQUEST['nombre'])) {
            $nombre = htmlentities($_REQUEST['nombre']);
            $apellido = htmlspecialchars($_REQUEST['apellido']);
            $asunto = htmlentities($_REQUEST['asunto']);
            $email = htmlentities($_REQUEST['email']);
            $telefono = htmlentities($_REQUEST['telefono']);
            $celular = htmlentities($_REQUEST['celular']);
            $mensaje = htmlentities($_REQUEST['mensaje']);
            $fecha = date("d/m/Y");
            $hora = date("H:i:s");

            $nombre = trim($nombre);
            $contarn = strlen($nombre);
            $variable = '<script>alert("hola") </script>';


            $nopermitido = array('<', '>', ';', '/');
            $permitido = array('', '', '', '');

            $aux = str_replace($nopermitido, $permitido, $variable);

            echo "Nombre=" . $nombre . "<br>";
            echo "Apellido=" . $apellido . "<br>";
            echo "E-mail=" . $email . "<br>";
            echo "Telefono=" . $telefono . "<br>";
            echo "Celular=" . $celular . "<br>";
            echo "Mensaje=" . $mensaje . "<br>";
            echo "Fecha=" . $fecha . "<br>";
            echo "Hora=" . $hora . "<br>";
            echo "<br> " . $aux . "!";
            echo "<br> ";

            /*
              $contrasena = 'pepe123';
              $token = $contrasena . 'P_07O-!';

              $contrasena2 = md5($token);
              $contrasena2 = hash('sha256', $contrasena2);

              echo '<br> Sin codificar: ' . $contrasena;
              echo '<br> Codificar: ' . $contrasena2;
             */
            $numero = '0912473';
            ECHO $numero . '<br>';
            ECHO filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
            /*
              if (filter_var($numero, FILTER_VALIDATE_INT) == true) {
              echo 'Esto es un número';
              } else {
              echo 'Esto NO es un número';
              } */
        }
        ?>
    </body>
</html>
