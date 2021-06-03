// CUANDO LA PAGINA SE CARGUE QUE REALICE LAS SIGUIENTES ACCIONES
$(document).ready(function(){
        
  // CUANDO LA PAGINA CARGUE QUE MUESTRE EL NUMERO DEL CARRITO USANDO ESTA FUNCION  
    mostrandoComentarios();
    //SELECCIONAMOS EL BOTON Y CUANDO HAGA CLIC EN EL QUE HAGA LO SIGUIENTE:
    $('button[name=btnComentar]').click(function(e){
        //RECOGEMOS EN UN OBJETO LOS ATRIBUTOS QUE LE ASIGNAMOS AL BOTON btnComentar
        const postData={
           idProducto: $(this).attr('data-idProducto'),
           idUsuario:  $(this).attr('data-idUsuario'),
           comentario: $('#comentario').val()

        }
        // MEDIANTE AJAX (POST) ENVIAMOS AL CARRITO EL ANTERIOR OBJETO
        $.post('InsertarComentario.php', postData, function(response){
            mostrandoComentarios();
            $('#form-comentarios').trigger('reset');
             
        });
       
      
        e.preventDefault();
        
           
        
    });
     // ESTA FUNCION ES PARA MOSTRAR LOS COMENTARIOS
   function mostrandoComentarios(){
    // RECOGEMOS LOS ATRIBUTOS QUE TENEMOS EN EL BOTON
       let idP=$('button[name=btnComentar]').attr('data-idProducto');
       let rol=$('button[name=btnComentar]').attr('data-rol');
       // ABRIMOS UN AJAX, Y ENVIAMOS la id del producto 
    $.ajax({
            url:'MostrarComentarios.php',
            type:'GET',
            data: {'id':idP},
            success: function numero(response){
            //   AQUI RECIBIMOS EL RESULTADO DE PHP Y CONVERTIVOS EL RESULTADO CON LA FUNCION JSON.parse
               let comentarios= JSON.parse(response); 
                let template='';
                // AQUI HACEMOS UN BUCLE Y QUE SE IMPRIMAN LOS COMENTARIOS DE LA TABLA
                comentarios.forEach(comentarios => {
                    
                    template += `
                    <p>&nbsp;&nbsp;${comentarios.Nombre}</p>
                    <textarea class='form-control'   cols="30" rows="5" disabled>${comentarios.Comentario} </textarea>
                    
                    
                    
                    `
                    if($("button[name=btnComentar]").attr('data-idUsuario')==comentarios.idUsuario){
                        template+=`
                        <button  type="button"  class='btn btn-danger ml-1 mt-1 mb-1 btnEliminar' data-id='${comentarios.idComentario}' name='btnEliminar' ><i class="fas fa-trash"></i></button>
                        <button class='btn btn-primary ml-1 mt-1 mb-1 btnModificar' data-comentario='${comentarios.Comentario}'  data-id='${comentarios.idComentario}' name='btnModificar' ><i class="fas fa-pen"></i></button>
                        
                        
                        `
                    }else if(rol=='Administrador'){
                         template+=`
                        <button class='btn btn-danger ml-1 mt-1 mb-1 btnEliminar' data-id='${comentarios.idComentario}' name='btnEliminar' ><i class="fas fa-trash"></i></button>
                        <button class='btn btn-primary ml-1 mt-1 mb-1 btnModificar'  data-id='${comentarios.idComentario}' name='btnModificar' ><i class="fas fa-pen"></i></button>
                        `
                    }

                });
             
               $('#mostrarComentarios').html(template);
               $('#mostrarComentariosSinSesion').html(template);
            }
            
        })
   }
//    AQUI SELECCIONAMOS EL DOCUMENTO Y DECIMOS QUE AL HACER CLICK EN EL BOTON .btnEliminar muestre una funcion
   $(document).on('click','.btnEliminar', function(){
   
       let idComentario= $(this).attr('data-id');
       mostrarAlertBorrar(idComentario);      
   })

  
  
   //    AQUI SELECCIONAMOS EL DOCUMENTO Y DECIMOS QUE AL HACER CLICK EN EL BOTON .btnModificar muestre una funcion
   $(document).on('click','.btnModificar', function(){
        let idComentario= $(this).attr('data-id');
        let comentario= $(this).attr('data-comentario');
        mostrarAlertModificar(idComentario,comentario); 
    });
    
    // AQUI HACEMOS LA FUNCION PARA MOSTRAR UN ALERT AL ELIMINAR
    function mostrarAlertBorrar(idComentario){
        // TEXTO DEL ALERT
        swal("¿Estás seguro de eliminar este comentario?", {
            // BOTONES
            buttons: {
                catch: {
                    text: "Confirmar",
                    value: "aceptar",
                    },
                cancel: "Cancelar",
              
            },
        })
        .then((value) => {
            switch (value) {
          
            case "aceptar":
                  // SI RECIBE EL VALOR aceptar QUE EJECUTE LA SIGUIENTE FUNCION POST 
                $.post('EliminarComentario.php', {'idComentario':idComentario}, function(response){
                    mostrandoComentarios(); 
                });
                swal("AnimeTEK", "¡El comentario se ha eliminado correctamente!", "success");
                break;
        
        
            
                
            }
        });
    }
    // AQUI HACEMOS LA FUNCION PARA MOSTRAR UN ALERT AL MODIFICAR
    function mostrarAlertModificar(idComentario, comentario){
        // TITULO ALERT
        swal("AnimeTEK", {
            // ESPECIFICAMOS QUE CONTENIDO QUEREMOS QUE TENGA
            content: {
                element: "input",
                attributes: {
                  name: "comentarioModificar",
                  value: comentario,
                  
                },
              },
              //BOTONES
              buttons: {
                catch: {
                    text: "Confirmar",
                    value: "aceptar",
                    },
                cancel: "Cancelar",
              
            },

          })
          .then((value) => {
            switch (value) {
                // SI RECIBE EL VALOR aceptar QUE EJECUTE LA SIGUIENTE FUNCION POST  
            case "aceptar":
                $.post('EditarComentario.php', {'idComentario':idComentario, 'comentario':`${$('input[name=comentarioModificar]').val()}`}, function(response){
                    mostrandoComentarios(); 
                   
                });
                swal("AnimeTEK", "¡El comentario se ha editado correctamente!", "success");
                break;
        
        
            
                
            }
        });
    }


});

