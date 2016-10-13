function agregarPublicacion(){
     var formData= new FormData(document.getElementById("formPrograma"));
        $.ajax({
                url:"php/agregar.php",
                type:"post",
                dataType:"html",
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                success:function(res){
                    $("#mensajes").html(res);
                    
                },
                error:function(e){
                    $("#mensajes").html("No se puede agregar los datos,Error:"+e.status);
                    
                } 
        });
}    

function buscarTituloPublicacion(){
  
    var datosFormulario = $("#formBuscar").serialize();
    $.ajax({
        url:'php/buscarNombre.php',
        type:'POST',
        data:datosFormulario,
        dataType:'json',
        beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            $("#contenidoBusqueda").css("display","none");
        },
        success:function(json){
            $("#mensajes").html(json.mensaje);
            $("#contenidoBusqueda").html(json.contenido);        
            $("#contenidoBusqueda").fadeIn("slow");
            $("tbody tr").on("click",function(){
                var id=$(this).find("td:first").html();
                $("#panelBuscar").html("");
                
                $("#id").val(id);
                $("#titulo").focus();
                
                buscarIdPublicacion();
                
                
                         
                  
                
             
                $("#buscar").fadeOut("slow");
                $("#panelPrograma").fadeIn("slow");
            });
        },
        error:function(e){
            $("#mensajes").html("No se pudo buscar registros Error:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
        
    });
    
}

function buscarIdPublicacion(){
  
    $('#id').prop('disabled',false);
    var datosFormulario = $('#formPrograma').serialize();
    $('#id').prop('disabled',true);
 
    $.ajax({
        type:'POST',
        url:'php/buscarId.php',
        data:datosFormulario,
        dataType:'json',
         beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            
        },
         success:function(json){
            
            $("#mensajes").html(json.mensajes);
            $("#titulo").val(json.titulo);        
            $("#contenido").val(json.contenido);   
            
           // $("#imagen").val(json.imagen); 
        },
        error:function(e){
            $("#mensajes").html("No se pudo recuperar los datos:"+e.status);
        },
        complete:function(objeto,exito,error){
            if(exito==="success"){
                
            }
        }
    })
}

function eliminarPublicacion(){
    $('#id').prop('disabled',false);//por no poder tomar el id de un campo deshabilitado
    var formData = new FormData(document.getElementById("formPrograma"));
    $('#id').prop('disabled',true);
    $.ajax({
        type:'POST',
        url:'php/eliminar.php',
        data:formData,
        dataType:'html',
        cache:false,
        contentType:false,
        processData:false,
         beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            
        },
         success:function(res){
            $('#mensajes').html(res);
            limpiarCampos();
        },
        error:function(e){
            $("#mensajes").html("No se pudo eliminar el registro:"+e.status);
        },
        complete:function(objeto,exito,error){
            $('#cod_usuario').focus();
            $('#cod_usuario').select();
            if(exito==="success"){
               
            }
        }
    })
}

function modificarPublicacion(){
    $('#id').prop('disabled',false);//por no poder tomar el id de un campo deshabilitado
    var formData = new FormData(document.getElementById("formPrograma"));
    $('#id').prop('disabled',true);
    $.ajax({
        type:'POST',
        url:'php/modificar.php',
        data:formData,
        dataType:'html',
        cache:false,
        contentType:false,
        processData:false,
         beforeSend: function(objeto){
            $("#mensajes").html("Enviando datos al servidor..");
            
        },
         success:function(res){
            $('#mensajes').html(res);
            limpiarCampos();
        },
        error:function(e){
            $("#mensajes").html("No se pudo eliminar el registro:"+e.status);
        },
        complete:function(objeto,exito,error){
            $('#id').focus();
            $('#id').select();
            if(exito==="success"){
               
            }
        }
    })
}

function limpiarCampos (){
    $("#id").val("");
    $("#titulo").val("");
    $("#contenido").val("");
    $("#password_usuario").val("");
    $("#rep_pass").val("");
    
}


