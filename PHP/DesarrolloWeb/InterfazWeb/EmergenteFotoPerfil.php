
<!-- ESTA ES LA VENTANA EMERGENTE PARA CAMBIAR LA FOTO DE PERFIL -->
  <div class="modal fade" id="actualizarFotoPerfil" tabindex="-1" aria-labelledby="actualizarFotoPerfilLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="actualizarFotoPerfilLabel">AnimeTEK</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
          <form action="ActualizarFotoPerfil.php?idUsuario=<?php echo $_SESSION['idUsuario'];?>" id="FormularioPerfil" method="post" enctype="multipart/form-data">      
                <!-- IMAGEN -->
                <div class="form-group grupo_ col-md-12 " >
                    <label for="fotoPerfil">Foto de Perfil</label><br>
                    <input type="file"  name="fotoPerfil" id="fotoPerfil" required>
                    
                </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                  <input type="submit" class="btn btn-success" value="Aceptar">
          </form>

        </div>
      </div>
    </div>
  </div>
