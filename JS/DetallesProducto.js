$(document).ready(function(){
        
       
    mostrandoComentarios();
    $('button[name=btnAccion]').click(function(e){
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
    $.ajax({
            url:'MostrarComentarios.php',
            type:'GET',
            success: function numero(response){
               let comentarios= JSON.parse(response); 
                let template='';
                comentarios.forEach(comentarios => {
                    template += `
                        <span>${comentarios.Comentario}</span><br>   
                    `
                });
               $('#mostrarComentarios').html(template);
            }
        })
   }
});