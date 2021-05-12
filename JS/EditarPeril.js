
function editarPerfil(consulta) {
    
    $.ajax({
    url : 'GuardarModificacionesPerfil.php',
    type : 'POST',
    dataType : 'html',
    data : { consulta : consulta },
    })
    .done(function (respuesta) {
        $("datos").html(respuesta);
    })

}
