<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../../img/logo.png"/>
        <link href="../../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <title>Carga de usuario</title>
    </head>
    <body>
        <div id="confirmar"></div>
        <div id="buscar"></div>
        <div id="panelPrograma" class="panel panel-primary">
            <div class="panel-body">
                <form id="formPrograma" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Codigo</span>
                        </div>
                        <div class="col-md-1 derecha">
                            <input id="cod_usuario" name="cod_usuario"
                                   type="text" class="form-control input-sm"
                                   placeholder="codigo">
                        </div>
                        <div class="col-md-1 derecha">
                            <button id="botonBuscarIdUsuario"
                                    type="button"
                                    class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Nombre</span>
                        </div>
                        <div class="col-md-2">
                            <input id="nombre_usuario" name="nombre_usuario"
                                   type="text" class="form-control input-sm"
                                   placeholder="Nombre completo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Alias</span>
                        </div>
                        <div class="col-md-2">
                            <input id="alias_usuario" name="alias_usuario"
                                   type="text" class="form-control input-sm"
                                   placeholder="Alias">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Correo electrónico</span>
                        </div>
                        <div class="col-md-2">
                            <input id="email_usuario" name="email_usuario"
                                   type="text" class="form-control input-sm"
                                   placeholder="Correo electrónico">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Password</span>
                        </div>
                        <div class="col-md-2">
                            <input id="password_usuario" name="password_usuario"
                                   type="password" class="form-control input-sm"
                                   placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Repetir password</span>
                        </div>
                        <div class="col-md-2">
                            <input id="rep_pass" name="rep_pass"
                                   type="password" class="form-control input-sm"
                                   placeholder="repetir password">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer centrado">
                <button id="botonAgregar" type="button"
                        class="btn btn-primary btn-sm">Agregar</button>
                <button id="botonModificar" type="button"
                        class="btn btn-primary btn-sm">Modificar</button>
                <button id="botonEliminar" type="button"
                        class="btn btn-primary btn-sm"
                        data-toggle="modal"
                        data-target="#confirmarEliminar">Eliminar</button>
                <button id="botonCancelar" type="button" 
                        class="btn btn-primary btn-sm">Cancelar</button>
                <button id="botonSalir" type="button" 
                        class="btn btn-primary btn-sm">Salir</button>
            </div>
        </div>
        <div id="mensajes" class="well well-sm centrado">Mensajes del sistema.</div>
        <div id="confirmarEliminar" class="modal fade" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="model-header centrado">
                        <button type="button" class="close"
                                data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">
                            Mensajes del sistema
                        </h4>
                    </div>
                    <div class="modal-body">
                        Esta seguro de eliminar estos datos?
                    </div>
                    <div class="modal-footer centrado">
                        <button id="botonEliminarAlert" type="button"
                                class="btn btn-primary btn-sm">
                            Eliminar
                        </button>
                        <button type="button" class="btn btn-default btn-sm"
                                data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            verificarSesion(true);
            $("#buscar").css('display', 'none');
            $("#botonBuscarIdUsuario").on('click', function() {
                $("#buscar").load("buscar.html");
                $("#buscar").fadeIn("slow");
                $("#panelPrograma").fadeOut("slow");
            });
            $("#botonAgregar").on('click', function() {
                agregarUsuario();
            });
            $("#botonModificar").on('click', function() {
                modificarUsuario();
            });
            $("#botonEliminar").on('click', function() {
                eliminarUsuario();
            });
            $("#botonSalir").on('click', function() {
                location.href = "../../../menu.php";
            });
            $("#botonCancelar").on('click', function() {
                $("#botonAgregar").prop('disabled', false);
                $("#botonModicar").prop('disabled', true);
                $("#botonEliminar").prop('disabled', true);
                $("#botonCancelar").prop('disabled', true);
                $("#id").prop('disabled', true);
                limpiarCampos();
            });
        </script>
    </body>
</html>
