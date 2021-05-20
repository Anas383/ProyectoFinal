$(document).ready(function(){
    $(function () {

        $("#rateYo").rateYo({
            

        });
        $("#rateYo").rateYo().on("rateyo.set", function (e, data) {

            let estrellas= data.rating;
            const postData={
                idProducto: $('button[name=btnComentar]').attr('data-idProducto'),
                idUsuario:  $('button[name=btnComentar]').attr('data-idUsuario'),
                valoracion: estrellas

            }
            $.post('Estrellas.php', postData, function(response){
            
            });
        });

    });
        
});
