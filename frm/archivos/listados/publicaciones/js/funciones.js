function agregarPublicacion(){
var formData = new FormData(document.getElementById("formPrograma"));
            $.ajax({
                url: "php/agregar.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false,
            success:function(res){
                $("#mensajes").html(res);
            },
            error: function(e){
                    $("#mensajes").html("No se puede agregar los datos, Error:"+e.status);
            }
            });  
}

function buscarIdPublicacion(){
    //desahabilitamos el campo id para que se obtenga el id al serializar
    $("#id").prop('disabled',false);
    var datosFormulario= $("#formPrograma").serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarId.php',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando daatos al servidor...");
        },
        success: function(json){
            $("#mensajes").html(json.mensaje);
            $("#titulo").val(json.titulo);
            $("#contenido").val(json.contenido);
            //para recargar la pagina pasarle los otros parametros a mostrar
            mostrarImagen($("#id").val(),$("#titulo").val(),$("#contenido").val());
        },
        error: function(e){
            $("#mensajes").html("No se pudo recuperar los datos en buscarIdrol");
        },
        complete: function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
    });
}

function buscarNombrePublicacion(){
    var datosFormulario= $("#formBuscar").serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarNombre.php',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor...");
            $("#contenidoBusqueda").css("display","none");
        },
        success: function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click", function(){
                var id=$(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#id").val(id);
                $("#titulo").focus();
                buscarIdPublicacion();
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error: function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete: function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
    });
}

function eliminarRol(){
    $("#id").prop('disabled',false);
    var formData = new FormData(document.getElementById("formPrograma"));
    $("#id").prop('disabled',true);
    $.ajax({
        url: "php/eliminar.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false,
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function(res){
            $("#mensajes").html(res);
            limpiarCampos();
        },
        error: function (e){
            $("#mensajes").html("No se pudo modificar los datos error"+e.status);
        },
        complete: function(objeto, exito,error){
            $("#id_rol").focus();
            $("#id_rol").select();
            if(exito === "success"){
                
            }
        }
    });
}

function limpiarCampos(){
    $("#id").val("");
    $("#nombre").val("");
    $("#imagen").val("");
    document.getElementById("imagen_mostrada").src="../../../img/predeterminado.jpg";
}

function modificarRol(){
    $("#id").prop('disabled',false);
     var formData = new FormData(document.getElementById("formPrograma"));
    $("#id").prop('disabled',true);
    $.ajax({
        url: "php/modificar.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     processData: false,
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function(ret){
            $("#mensajes").html(ret);
            limpiarCampos();
        },
        error: function (e){
            $("#mensajes").html("No se pudo modificar los datos error"+e.status);
        },
        complete: function(objeto, exito,error){
            $("#id_rol").focus();
            $("#id_rol").select();
            if(exito === "success"){
                
            }
        }
    });
}