
// CUANDO LA PAGINA SE CARGUE QUE REALICE LAS SIGUIENTES ACCIONES
$(document).ready(function(){
    // CUANDO LA PAGINA CARGUE QUE MUESTRE EL NUMERO DEL CARRITO USANDO ESTA FUNCION    
    mostrarNumeroCarrito();
    //SELECCIONAMOS EL BOTON Y CUANDO HAGA CLIC EN EL QUE HAGA LO SIGUIENTE:
    $('button[name=btnAccion]').on('click',function(e){
        //RECOGEMOS EN UN OBJETO LOS ATRIBUTOS QUE LE ASIGNAMOS AL BOTON btnAccion
        const postData={
           idProducto: $(this).attr('data-id'),
           precio:  $(this).attr('data-precio'),
           cantidad:$(this).attr('data-cantidad'),
           stock:$(this).attr('data-stock')
           

        }
        // MEDIANTE AJAX (POST) ENVIAMOS AL CARRITO EL ANTERIOR OBJETO
        $.post('Carrito.php', postData, function(response){
            // VOLVEMOS A EJECUTAR LA FUNCION AQUI PARA QUE AL REALIZAR LA CONSULTA SE MUESTRE EL NUMERO ACTUALIZADO
            mostrarNumeroCarrito(); 
            console.log(response);
        });
        e.preventDefault();
           
      
    });
    // ESTA FUNCION ES PARA MOSTRAR EL NUMERO DE PRODUCTOS DEL CARRITO
    function mostrarNumeroCarrito(){
        // ABRIMOS UN AJAX, PERO NO ENVIAMOS DATOS PORQUE QUEREMOS SOLO LISTAR LA TABLA
        $.ajax({
            url:'NumeroCarrito.php',
            type:'GET',

            success: function numero(response){
                // AQUI CONVERTIMOS LO QUE HA DEVULTO PHP A UN INT
                let num= parseInt(response);
                // MEDIANTE JAVASCRIPT INTRODUCIMOS EL RESULTADO EN EL HTML
                document.getElementById('numC').innerHTML=num;
                document.getElementById('numCM').innerHTML=num;
               
            }
        })
    }
  
});