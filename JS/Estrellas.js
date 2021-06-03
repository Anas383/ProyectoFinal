$(document).ready(function(){
    $(function () {
        // CON ESTA FUNCION GENERAMOS LAS ESTRELLAS, EN MI NO TIENE NINGUN ATRIBUTO PORQUE LO QUIERO DEFAULT
        $("#rateYo").rateYo({
            

        });
        // ESTA ES UNA FUNCION QUE USA SU PROPIO EVENTO "rateyo.set" QUE ES CUANDO SE HACE CLICK EN LAS ESTRELLAS 
        // BASICAMENTE ESTAMOS DICIENDO QUE AL HACER CLICK EN LAS ESTRELLAS HAGA LO SIGUIENTE
        $("#rateYo").rateYo().on("rateyo.set", function (e, data) {
            //RECOGEMOS LA INFORMACION  MEDIANTE EL DATA QUE HEMOS DECLARADO EN LA FUNCION, Y CON EL "data.rating" RECOGEMOS EL NUMERO
            //Y LO GUARDAMOS EN UNA VARIABLE
            let estrellas= data.rating;
            //RECOGEMOS LOS DATOS DEL PRODUCTO Y DEL USUARIO EN UN OBJETO LLAMADO "postData"
            const postData={
                idProducto: $('button[name=btnComentar]').attr('data-idProducto'),
                idUsuario:  $('button[name=btnComentar]').attr('data-idUsuario'),
                valoracion: estrellas

            }
            // FINALMENTE MEDIANTE AJAX ENVIAMOS POR POST LOS DATOS AL PHP "Estrellas.php" Y HACEMOS EL INSERT O EL UPDATE DEL RATING
            $.post('Estrellas.php', postData, function(response){
            
            });
        });

    });
        
});
