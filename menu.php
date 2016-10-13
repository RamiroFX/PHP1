<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Proyecto PHP1</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <style type="text/css">
            #contenido{
                display: none;
            }
        </style>
    </head>
    <body>
        <div id="contenido">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapse"
                                data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Proyecto PHP1</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Archivos <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="frm/archivos/publicaciones">Publicaciones</a></li>
                                    <li><a href="frm/archivos/usuarios">Usuarios</a></li>
                                    <li><a href="frm/archivos/formularios">Productos</a></li>
                                    <li><a href="frm/archivos/formularios">Eventos</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropwon">
                                <a> Bienvenido <strong><?php echo $_SESSION['login_usuario']; ?> </strong></a>
                            </li>
                            <li class="dropwon">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Ayuda<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="index2.html">Salir</a></li>
                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <img src="img/fondo.png" alt="" style="max-width: 100%; max-height: auto;" />
            <div id="mensajes" class="well well-sm">Mensajes del sistema</div>
        </div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script> verificarSesion(false);</script>
    </body>
</html>
