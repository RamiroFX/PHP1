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
        <title>Carga de productos</title>
    </head>
    <body>
        <div id="confirmar"></div>
        <div id="buscar"></div>
        <div id="panelProductos" class="panel panel-primary">
            <div class="panel-body">
                <form id="formProductos" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-1 derecha">
                            <span>Id</span>
                        </div>
                        <div class="col-md-1 derecha">
                            <input id="id_producto" name="id_producto"
                                   type="text" class="form-control input-sm"
                                   placeholder="id">
                        </div>
                        <div class="col-md-1">
                            <button id="botonBuscarIdProducto"
                                    type="button"
                                    class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 derecha">
                            <span>Nombre</span>
                        </div>
                        <div class="col-md-1">
                            <input id="nombre" name="nombre"
                                   type="text" class="form-control input-sm"
                                   placeholder="nombre">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 derecha">
                            <span>Descripcion</span>
                        </div>
                        <div class="col-md-5">
                            <textarea id="descripcion" name="descripcion"
                                      type="text" class="form-control input-sm"
                                      placeholder="descripcion" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 derecha">
                            <span>Precio</span>
                        </div>
                        <div class="col-md-1">
                            <input id="precio" name="precio"
                                   type="text" class="form-control input-sm"
                                   placeholder="precio">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 derecha">
                            <span>Seleccionar imagen</span>
                        </div>
                        <div class="col-md-1">
                            <input id="imagen" name ="imagen" type="file" class="btn btn-primary btn-sm"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 izquierda">
                            <img id="mosaico" src="#" alt="your image"style="width:304px;height:228px;" />
                        </div>
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

                </form>
            </div>
        </div>
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
        <div id="mensajes" class="">Mensajes del sistema</div>
        <script src="../../../js/jquery.min.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../js/funciones.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            $("#buscar").css('display', 'none');
            $("#botonBuscarIdProducto").on('click', function() {
                $("#buscar").load("buscar.html");
                $("#buscar").fadeIn("slow");
                $("#panelProductos").fadeOut("slow");
            });

            $("#imagen").change(function() {
                readURL(this);
            });
            $("#botonAgregar").on('click', function() {
                agregarProducto();
            });
            $("#botonModificar").on('click', function() {
                modificarProducto();
            });
            $("#botonEliminar").on('click', function() {
                eliminarProducto();
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
