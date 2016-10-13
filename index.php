<!DOCTYPE html>
<html>
    <head>
        <title>PHP</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="panelAcceso" class="panel panel-primary">
            <div class="panel-heading centrado">Acceso al sistema</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 centrado">
                        <img src="img/logo.png" alt="">
                    </div>
                </div>
                <hr>
                <form id="formAcceso">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Usuario</label>
                        </div>
                        <div class="col-md-8">
                            <input id="login_usuario" name="login_usuario" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Password</label>
                        </div>
                        <div class="col-md-8">
                            <input id="password_usuario" name="password_usuario" type="password" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer centrado">
                <button id="botonIngresar" class="btn btn-primary btn-sm">Ingresar</button>
            </div>
        </div>
        <div id="mensajes" class="well well-sm">Mensajes del sistema</div>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
//            cerrarSesion();
//            $("#login_usuario").focus();
//            siguienteCampo("#login_usuario", "#password_usuario", false);
//            siguienteCampo("#password_usuario", "#botonIngresar", false);
            $("#botonIngresar").on("click", function() {
                validarAcceso();
            });
        </script>
    </body>
</html>
