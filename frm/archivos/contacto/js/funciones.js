function enviarMensaje() {
    var formData = new FormData(document.getElementById("formPrograma"));
    $.ajax({
        url: "php/enviar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            $("#mensajes").html(res);
            $("#botonEnviar").prop('disabled', true);
            $("#botonLimpiar").promise('disabled', true);
        },
        error: function(e) {
            $("#mensajes").html("No se puede agregar los datos, Error: " + e.status);
        }
    });
}

function limpiarCampos(){
    $("#nombre").val("");
    $("#apellido").val("");
    $("#asunto").val("");
    $("#email").val("");
    $("#telefono").val("");
    $("#celular").val("");
    $("#mensaje").val("");
}

