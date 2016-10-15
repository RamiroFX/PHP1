function agregarProducto() {
    var formData = new FormData(document.getElementById("formProductos"));
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

function buscarNombreProducto() {
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
                $("#id_producto").val(id);
                buscarIdProducto();
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

function buscarIdProducto() {
    $('#id_producto').prop('disabled', false);
    var datosFormulario = $('#formPublicacion').serialize();
    $('#id_producto').prop('disabled', true);

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
            $("#nombre").val(json.nombre);
            $("#descripcion").val(json.descripcion);
            $("#precio").val(json.precio);
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

function eliminarProducto() {
    $('#id').prop('disabled', false);//por no poder tomar el id de un campo deshabilitado
    var formData = new FormData(document.getElementById("formProducto"));
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
            $('#id_producto').focus();
            $('#id_producto').select();
            if (exito === "success") {

            }
        }
    })
}

function modificarProducto() {
    $('#id_producto').prop('disabled', false);//por no poder tomar el id de un campo deshabilitado
    var formData = new FormData(document.getElementById("formProducto"));
    $('#id_producto').prop('disabled', true);
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
            $('#id_producto').focus();
            $('#id_producto').select();
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


