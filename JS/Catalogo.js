$(document).ready(function(){
        
    mostrarNumeroCarrito();
    
    $('button[name=btnAccion]').on('click',function(e){
        const postData={
           idProducto: $(this).attr('data-id'),
           precio:  $(this).attr('data-precio'),
           cantidad:$(this).attr('data-cantidad'),
           stock:$(this).attr('data-stock')
           

        }
        $.post('Carrito.php', postData, function(response){
            mostrarNumeroCarrito(); 
            console.log(response);
        });
        e.preventDefault();
           
      
    });
    function mostrarNumeroCarrito(){
        $.ajax({
            url:'NumeroCarrito.php',
            type:'GET',

            success: function numero(response){
                let num= parseInt(response);
                document.getElementById('numC').innerHTML=num;
                document.getElementById('numCM').innerHTML=num;
               
            }
        })
    }
   
});