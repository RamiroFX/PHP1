
function buscarPublicacionFecha() {
    var datosFormulario = $("#formReporte").serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarPublicacionFecha.php',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
            $("#contenidoBusqueda").css("display", "none");
        },
        success: function(json) {
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
        },
        error: function(e) {
            $("#mensajes").html("No se pudo buscar registros. Error: " + e.status);
        },
        complete: function(objeto, exito, error) {
            if (exito === "success") {

            }
        }
    });
}

function buscarIdPublicacion(){
    $('#cod_usuario').prop('disabled',false);
    var datosFormulario = $('#formPrograma').serialize();
    $.ajax({
        type:'POST',
        url:'php/buscarId.php',
        data:datosFormulario,
        dataType:'json',
         beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
        },
         success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#cod_usuario").val(json.id_usuario);        
            $("#nombre_usuario").val(json.nombre_usuario);        
            $("#alias_usuario").val(json.alias_usuario);   
            $("#password_usuario").val(json.password_usuario); 
            $("#rep_pass").val(json.repetir_password); 
        },
        error:function(e){
            $("#mensajes").html("No se pudo recuperar los datos en buscarIdUsuario:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
    })
}
