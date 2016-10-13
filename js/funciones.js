function validarAcceso() {
    $("#mensajes").html("Mensajes del sistema");
    if ("#login_usuario".val === "") {
        $("#mensajes").html("Usuario no debe estar vacio");
    }
    else if ("#password_usuario".val === "") {
        $("#mensajes").html("Password no debe estar vacio");
    } else {
        validarAccesoAjax();
    }
}

function validarAccesoAjax() {
    var datosFormulario = $("#formAcceso").serialize();
    $.ajax({
        type: 'POST',
        url: "php/validarAcceso.php",
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function(json) {
            if (json.acceso === "true") {
                location.href = "menu.php";
            } else {
                $("#mensajes").html("Usuario y/o contraseña incorrecta.");
            }
        },
        error: function(e) {
            $("#mensajes").html("No se pudo conectar con el servidor. Error: " + e.status);
        },
        complete: function(objeto, exito, error) {
            if (exito === "succes") {

            }
        }
    });
}

function verificarSesion(programa) {
    var url = 'php/verificarSesion.php';
    if (programa) {
        url = '../../../php/verificarSesion.php';
    }
    var datosFormulario = $("#formAcceso").serialize();
    $.ajax({
        type: 'POST',
        url: url,
        data: datosFormulario,
        dataType: 'json',
        beforeSend: function(objeto) {
            $("#mensajes").html("Enviando datos al servidor...");
        },
        success: function(json) {
            if (json.activo === "false") {
                if (programa) {
                    location.href = "../../../index.php";
                } else {
                    location.href = "index.php?#mensajes=" + json.mensaje;
                    //location.href = "index.php?".$("#mensajes").html(json.mensaje);
                    //?field1=10&name=Sally
                }
            } else {
                $("#contenido").css("display", "block");
            }
//            $("#snombre_empresa").html("IDT");
//            $("#susuario_usuario").html(json.login_usuario);
            $("#mensajes").html(json.mensaje);
        },
        error: function(e) {
            $("#mensajes").html("Error: No se pudo recuperar la sesion")
        },
        complete: function(objeto, exito, error) {
            if (exito === "success") {

            }
        }
    });
}