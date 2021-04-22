
     <!-- VENTANA EMERGENTE PARA ELIMINAR USUARIO -->
     <div class="modal fade" id="emergenteEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="emergenteEliminarUsuario"
        aria-hidden="true">
        <div class="modal-dialog ventanaEmergente" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="emergenteEliminarUsuario">AnimeTEK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-window-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de eliminar a este usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <span class="">
                        <button type="button" class="btn btn-success">
                            <a href="EliminarUsuario.php?idUsuario=<?php echo $fila['idUsuario'];?>" style="text-decoration: none; color:white">Aceptar</a>
                        </button>
                    </span>

                </div>
            </div>
        </div>
    </div>