<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html"/>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../../img/logo.png"/>
        <link href="../../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../css/estilos.css" rel="stylesheet" type="text/css"/>
        <title>Reportes de publicaciones</title>
    </head>
    <body>
        <div id="confirmar"></div>
        <div id="buscar"></div>
        <div id="panelReporte" class="panel panel-primary">
            <div class="panel-body">
                <form id="formReporte" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Desde id</span>
                        </div>
                        <div class="col-md-2">
                            <input id="id_reporte" name="id_reporte"
                                   type="text" class="form-control input-sm"
                                   placeholder="Desde ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Hasta id</span>
                        </div>
                        <div class="col-md-2">
                            <input id="hasta_id" name="hasta_id"
                                   type="text" class="form-control input-sm"
                                   placeholder="Hasta ID">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Desde fecha</span>
                        </div>
                        <div class="col-md-2">
                            <input id="desde_fecha" name="desde_fecha"
                                   type="date" class="form-control input-sm"
                                   placeholder="dd/mm/aaaa">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Hasta fecha</span>
                        </div>
                        <div class="col-md-2">
                            <input id="hasta_fecha" name="hasta_fecha"
                                   type="date" class="form-control input-sm"
                                   placeholder="dd/mm/aaaa">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer centrado">
                <button id="botonPrevisualizarDatos" type="button"
                        class="btn btn-primary btn-sm">Previsualizar Datos</button>
                <button id="botonExportarPDF" type="button"
                        class="btn btn-primary btn-sm">Exportar a PDF</button>
                <button id="botonExportarExcel" type="button"
                        class="btn btn-primary btn-sm">Exportar a Excel</button>
                <button id="botonSalir" type="button" 
                        class="btn btn-primary btn-sm">Salir</button>
            </div>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulo</th>
                        <th>Contenido</th>
                        <th>fecha</th>
                    </tr>
                </thead>
                <tbody id="contenidoBusqueda">
                </tbody>
            </table>
        </div>
        <div id="mensajes" class="well well-sm centrado">Mensajes del sistema.</div>
        <script src="../../js/jquery.min.js" type="text/javascript"></script>
        <script src = "js/funciones.js" type = "text/javascript" ></script>
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../js/funciones.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../css/jquery-ui.css">
        <script src="../../js/jquery-ui.js"></script>
        <script>
            $("#botonPrevisualizarDatos").on('click', function () {
                buscarPublicacionFecha();
            });
            $("#botonExportarExcel").on('click', function () {
                di = id_reporte;
                hi = "";
                df = "";
                hf = "";
            });
            
            $(function () {
                $("#desde_fecha").datepicker();
                $("#hasta_fecha").datepicker();
            });
        </script>
    </body>
</html>
