function agregarPublicacion() {
    var formData = new FormData(document.getElementById("formPublicacion"));
    $.ajax({
        url: "php/agregar.php",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(res) {
            $("#mensajes").html(res);
        },
        error: function(e) {
            $("#mensajes").html("No se puede agregar los datos, Error: " + e.status);
        }
    });
}

function buscarTituloPublicacion() {
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url: 'php/buscarNombre.php',
        type: 'POST',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display", "none");
        },
        success: function(json) {
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click", function() {
                var id = $(this).find("td:first").html();
                $("#panelBuscar").html("");
                $("#cod_publicacion").val(id);
                buscarIdPublicacion();
                $("#buscar").fadeOut("slow");
                $("#panelPublicaciones").fadeIn("slow");
            });
        },
        error: function(e) {
            $("#mensajes").html("No se pudo buscar registros Error:" + e.status);
        },
        complete: function(objeto, exito, error) {
            if (exito === "success") {

            }
        }

    });

}

function buscarIdPublicacion() {
    $('#cod_publicacion').prop('disabled', false);
    var datosFormulario = $('#formPublicacion').serialize();
    $('#cod_publicacion').prop('disabled', true);

    $.ajax({
        type: 'POST',
        url: 'php/buscarId.php',
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor..");
        },
        success: function(json) {
            $("#mensajes").html(json.mensaje);
            $("#titulo").val(json.titulo);
            $("#contenido").val(json.contenido);
            if (json.imagen !== null & json.imagen !== "") {
                $('#mosaico').attr('src', "imagenes/" + json.imagen);
            }
        },
        error: function(e) {
            $("#mensajes").html("No se pudo recuperar los datos: " + e.status);
        },
        complete: function(objeto, exito, error) {
            if (exito === "success") {

            }
        }
    });
}

function eliminarPublicacion() {
    $('#id').prop('disabled', false);//por no poder tomar el id de un campo deshabilitado
    var formData = new FormData(document.getElementById("formPublicacion"));
    $('#id').prop('disabled', true);
    $.ajax({
        type: 'POST',
        url: 'php/eliminar.php',
        data: formData,
        dataType: 'html',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor..");
        },
        success: function(res) {
            $('#mensajes').html(res);
            limpiarCampos();
        },
        error: function(e) {
            $("#mensajes").html("No se pudo eliminar el registro:" + e.status);
        },
        complete: function(objeto, exito, error) {
            $('#cod_usuario').focus();
            $('#cod_usuario').select();
            if (exito === "success") {

            }
        }
    })
}

function modificarPublicacion() {
    $('#cod_publicacion').prop('disabled', false);//por no poder tomar el id de un campo deshabilitado
    var formData = new FormData(document.getElementById("formPublicacion"));
    $('#cod_publicacion').prop('disabled', true);
    $.ajax({
        type: 'POST',
        url: 'php/modificar.php',
        data: formData,
        dataType: 'html',
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor..");
        },
        success: function(res) {
            $('#mensajes').html(res);
            limpiarCampos();
        },
        error: function(e) {
            $("#mensajes").html("No se pudo eliminar el registro:" + e.status);
        },
        complete: function(objeto, exito, error) {
            $('#cod_publicacion').focus();
            $('#cod_publicacion').select();
            if (exito === "success") {

            }
        }
    })
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#mosaico').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function limpiarCampos() {
    $("#id").val("");
    $("#titulo").val("");
    $("#contenido").val("");
    $("#password_usuario").val("");
    $("#rep_pass").val("");

}


