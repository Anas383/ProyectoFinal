$(document).ready(function(){
        
    
    mostrandoComentarios();
    
    $('button[name=btnComentar]').click(function(e){
        const postData={
           idProducto: $(this).attr('data-idProducto'),
           idUsuario:  $(this).attr('data-idUsuario'),
           comentario: $('#comentario').val()

        }
        $.post('InsertarComentario.php', postData, function(response){
            mostrandoComentarios();
            $('#form-comentarios').trigger('reset');
             
        });
       
      
        e.preventDefault();
        
           
        
    });
    
   function mostrandoComentarios(){
       let idP=$('button[name=btnComentar]').attr('data-idProducto');
       let nombreUsuario =$('button[name=btnComentar]').attr('data-nombreUsuario');
       let rol=$('button[name=btnComentar]').attr('data-rol');;
    $.ajax({
            url:'MostrarComentarios.php',
            type:'GET',
            data: {'id':idP},
            success: function numero(response){
              
               let comentarios= JSON.parse(response); 
                let template='';
                
                comentarios.forEach(comentarios => {
                 
                    template += `
                    <p>&nbsp;&nbsp;${comentarios.Nombre}</p>
                    <textarea class='form-control'   cols="30" rows="5" disabled>${comentarios.Comentario} </textarea>
                    
                    
                    
                    `
                    if($("button[name=btnComentar]").attr('data-idUsuario')==comentarios.idUsuario){
                        template+=`
                        <button class='btn btn-danger ml-1 mt-1 mb-1 btnEliminar' data-id='${comentarios.idComentario}' name='btnEliminar' ><i class="fas fa-trash"></i></button>
                        <button class='btn btn-primary ml-1 mt-1 mb-1 btnModificar'   data-id='${comentarios.idComentario}' name='btnModificar' ><i class="fas fa-pen"></i></button>
                        
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
   $(document).on('click','.btnEliminar', function(){
       let idComentario= $(this).attr('data-id');
       $.post('EliminarComentario.php', {'idComentario':idComentario}, function(response){
             mostrandoComentarios();
            
            
    });
   })
   
   $(document).on('click','.btnModificar', function(){

        let idComentario= $(this).attr('data-id');
        console.log(idComentario);

        // $.post('EliminarComentario.php', {'idComentario':idComentario}, function(response){
        //     mostrandoComentarios();
            
            
        // });
    })
    




});

