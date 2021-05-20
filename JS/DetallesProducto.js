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
         
             
        });
       
      
        e.preventDefault();
        
           
        
    });
    
   function mostrandoComentarios(){
       let idP=$('button[name=btnComentar]').attr('data-idProducto');
       let nombreUsuario =$('button[name=btnComentar]').attr('data-nombreUsuario');
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
                    <textarea class='form-control' cols="30" rows="5" disabled>${comentarios.Comentario} </textarea>
                    
                    `
                });
             
               $('#mostrarComentarios').html(template);
               $('#mostrarComentariosSinSesion').html(template);
            }
        })
   }
   
});
