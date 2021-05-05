
     <!-- VENTANA EMERGENTE PARA ELIMINAR USUARIO -->
     <div class="modal fade" id="emergenteDireccionesAlPagar" tabindex="-1" role="dialog" aria-labelledby="emergenteDireccionesAlPagar"
        aria-hidden="true">
        <div class="modal-dialog ventanaEmergente" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="emergenteDireccionesAlPagar">AnimeTEK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-window-close"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Direcciones
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <span class="">
                        <button type="button" class="btn btn-success">
                            <a href="InsertarDirecciones.php?precioTotal=<?php echo $total;?>" style="text-decoration: none; color:white">Aceptar</a>
                        </button>
                    </span>

                </div>
            </div>
        </div>
    </div>