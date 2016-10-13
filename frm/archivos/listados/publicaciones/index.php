<!DOCTYPE html>
<html>
    <head>
        <title>Informe de Publicaciones</title>
        <link rel="icon" type="image/png" href="../../../img/logo.png"/>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, 
              initial-scale=1.0">
        <link href="../../../../css/bootstrap-theme.min.css" 
              rel="stylesheet" type="text/css"/>
        <link href="../../../../css/bootstrap.min.css" rel="stylesheet" 
              type="text/css"/>
        <link href="../../../../css/estilos.css" rel="stylesheet" 
              type="text/css"/>
    </head>
    <body>
        <div id="panelPrograma" class="panel panel-primary">
            <div class="panel-heading centrado">Listado de Publicaciones</div>
            <div class="panel-body">
                <form id="formPrograma" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Desde Id</span>
                        </div>
                        <div class="col-md-2">
                            <input id="desde_id" name="id" 
                                   type="text"
                                   class="form-control input-sm" 
                                   placeholder="Desde Id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 derecha">
                            <span>Hasta Id</span>
                        </div>
                        <div class="col-md-2">
                            <input id="hasta_id" name="id" 
                                   type="text"
                                   class="form-control input-sm" 
                                   placeholder="Hasta Id">
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-2 derecha">
                              <span>Desde Fecha</span>
                        </div>
                        <div class="col-md-2">
                            <input id="fecha_desde" name="titulo" 
                                   type="date" class="form-control
                                   input-sm" placeholder="Desde Fecha">
                        </div> 
                    </div>
                   <div class="row">
                         <div class="col-md-2 derecha">
                              <span>Hasta Fecha</span>
                        </div>
                        <div class="col-md-2">
                            <input id="fecha_hasta" name="titulo" 
                                   type="date" class="form-control
                                   input-sm" placeholder="Hasta Fecha">
                        </div> 
                    </div>
                </form>
            </div>
            <div class="panel-footer centrado">
                <button id="botonPrevisualizar" type="button" 
                        class="btn btn-primary btn-sm">Previsualizar Datos</button>
                <button id="botonPdf" type="button" 
                        class="btn btn-primary btn-sm">Exportar a PDF</button>
                <button id="botonExcel" type="button" 
                        class="btn btn-primary btn-sm">Exportar a Excel</button>
                <button id="botonSalir" type="button" 
                        class="btn btn-primary btn-sm">Salir</button>
            </div>
        </div>
        <div id="mensajes" class="well well-sm centrado">
            Mensajes del Sistema.</div>
        <script src="../../../../js/jquery.min.js" type="text/javascript">
        </script>
        <script src="../../../../js/bootstrap.min.js" 
        type="text/javascript"></script>
        <script src="../../../../js/funciones.js" 
        type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
        <script>
            function verificardatos(){
                if($("#desde_id").val()==""){
                    $("#mensajes").html("Debe completar el campo desde");
                    return false;
                }
                else if($("#hasta_id").val()==""){
                    $("#mensajes").html("Debe completar el campo hasta");
                    return false;
                }
                else if($("#fecha_desde").val()==""){
                    $("#mensajes").html("Debe completar el campo Desde Fecha");
                    return false;
                }
                else if($("#fecha_hasta").val()==""){
                    $("#mensajes").html("Debe completar el campo Hasta Fecha");
                    return false;
                }
                return true;
            }
            $("#botonPrevisualizar").on('click',function(){
                if(verificardatos()){
                    var d=$("#desde_id").val();
                    var h=$("#hasta_id").val();                 
                    var fd=$("#fecha_desde").val();
                    var fh=$("#fecha_hasta").val();
                    window.open("../../../previsualizar_excel.php?d="+d+"&h="+h+"&fd="+fd+"&fh="+fh+"&pre=si");
                }
            });
            $("#botonPdf").on('click',function(){
                if(verificardatos()){
                    var d=$("#desde_id").val();
                    var h=$("#hasta_id").val();
                    var fd=$("#fecha_desde").val();
                    var fh=$("#fecha_hasta").val();
                    window.open("../../../php-mysql.php?d="+d+"&h="+h+"&fd="+fd+"&fh="+fh);
                }
            });
            $("#botonExcel").on('click',function(){
                if(verificardatos()){
                    var d=$("#desde_id").val();
                    var h=$("#hasta_id").val();
                    var fd=$("#fecha_desde").val();
                    var fh=$("#fecha_hasta").val();
                    window.open("../../../previsualizar_excel.php?d="+d+"&h="+h+"&fd="+fd+"&fh="+fh+"&pre=no");
                }
            });
            $("#botonSalir").on('click',function(){
                location.href="../../../../menu.php";
            });
        </script>
    </body>
</html>