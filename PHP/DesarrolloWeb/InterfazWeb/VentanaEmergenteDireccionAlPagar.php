
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
                  <form action="InsertarDirecciones.php?precioTotal=<?php echo $total;?>" id="formularioDirecciones" method="post">
                    <legend>Dirección de envio.</legend>
                    <div class="row">
                        <?php 
                        
                        $idUsuario=$_SESSION['idUsuario'];
                        $consultarDomicilio=BuscarUsuarioDomicilio($conexion,$idUsuario);
                        $domicilio= mysqli_fetch_assoc($consultarDomicilio);
                        
                        ?>
                        <div class=" grupo_cp form-group col-md-6">
                            <label for="cp">Código Postal</label>
                            <input type="text" name="cp" class="form-control" id="cp" value="<?php echo $domicilio['CP'] ?>" required>
                        <p class="mensajeError-oculto" id="mError-cp">¡Código Postal incorrecta!</p>
                        </div>
                    
                        <div class=" grupo_provincia form-group col-md-6">
                            <label for="provincia">Provincia</label>
                            <input type="text" name="provincia" class="form-control" id="provincia" value="<?php echo $domicilio['Provincia'] ?>" required>
                        <p class="mensajeError-oculto" id="mError-provincia">¡Provincia incorrecta!</p>
                        </div>
                        <div class="grupo_comunidadAutonoma form-group col-md-6">
                            <label for="comunidadAutonoma">Comunidad Autónoma</label>
                            <input type="text" name="comunidadAutonoma" class="form-control" id="comunidadAutonoma" value="<?php echo $domicilio['ComunidadAutonoma'] ?>"required>
                        <p class="mensajeError-oculto" id="mError-comunidadAutonoma">¡Comunidad Autónoma incorrecta!</p>
                        </div>
                        <div class="grupo_calle form-group col-md-6">
                            <label for="calle">Calle</label>
                            <input type="text" name="calle" class="form-control" id="calle" value="<?php echo $domicilio['Calle'] ?>" required>
                        <p class="mensajeError-oculto" id="mError-calle">¡Calle incorrecta!</p>
                        </div>
                        <div class="grupo_numero form-group col-md-6">
                                <label for="numero">Número</label>
                                <input type="number" name="numero" class="form-control"  value="<?php echo $domicilio['Numero'] ?>" id="numero" required>
                            <p class="mensajeError-oculto" id="mError-numero">¡Número incorrecta!</p>
                        </div>
                    
                        <div class="grupo_piso form-group col-md-6">
                                <label for="piso">Piso</label>
                                <input type="text" name="piso" class="form-control"  value="<?php echo $domicilio['Piso'] ?>" id="piso">
                            <p class="mensajeError-oculto" id="mError-piso">¡Piso incorrecta!</p>
                        </div>
                        
                        <div class="grupo_portal form-group col-md-12">
                                <label for="portal">Portal</label>
                                <input type="text" name="portal" class="form-control"  value="<?php echo $domicilio['Portal'] ?>" id="portal">
                            <p class="mensajeError-oculto" id="mError-portal">¡Portal incorrecta!</p>
                        </div>
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <span class="">
                        
                           <input type="submit" class="btn btn-success" value="Enviar">
                      
                        </form> 
                    </span>

                </div>
            </div>
        </div>
    </div>