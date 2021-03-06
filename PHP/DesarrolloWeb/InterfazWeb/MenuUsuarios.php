<?php
    
    session_start();
    // AQUÍ CONTRILAMOS QUE CUANDO LA SESION ESTE INICIADA Y NO SEA "Administrador" se muestre lo siguiente
    if($_SESSION['usuarioConectado']==true){ ?> 

        <!-- ENLACES PARA MOVIL-->
        <div class="d-block d-sm-block d-md-none linksMenu fuenteMenu ">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <span > <a href="MostrarCarrito.php"><i class="fas fa-shopping-cart"></i>
                    (<span id="numCM"></span>)&nbsp;
                    &nbsp;</a></span>
                        <div class="dropdown show">
                            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> <?php echo $_SESSION['ROL']." : ".$_SESSION['Usuario'];?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                                <a class="dropdown-item" style="color:black;" href="Perfil.php"><i class="fas fa-user-cog"></i> Perfil</a>
                            </div>
                        </div>&nbsp;&nbsp;&nbsp;
                        <a href="../Login/Desconectarse.php" data-toggle="modal" data-target="#emergenteLogOut"><i class="fas fa-sign-out-alt"></i>&nbsp;Cerrar sesión</a>&nbsp;&nbsp;&nbsp;   
                    </div>
                </div>
            </nav>
        </div>
            
        <?php
            
        }else{?>

        <!-- ENLACES PARA MÓVIL -->
        <div class="d-block d-sm-block d-md-none linksMenu fuenteMenu ">
            
            <a href="../Login/Login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Iniciar Sesión</a>&nbsp;&nbsp;&nbsp;
            <a href="../Registro/Registro.php" ><i class="fas fa-user"></i>  &nbsp;Regístrate</a>&nbsp;&nbsp;
                
        </div>
             
        <?php
        }
        ?>
        </div>
            
        <?php
            session_start();
            if($_SESSION['usuarioConectado']==true){ 
        ?>   
        <!-- ENLACES PARA ESCRITORIO -->
        
        <div class="d-none d-sm-none d-md-block linksMenu fuenteMenu ">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        
                    <span > <a href="MostrarCarrito.php"><i class="fas fa-shopping-cart"></i>&nbsp;(<span id="numC"></span>)&nbsp;</a></span>
                        
                        <div class="dropdown show">
                            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i> <?php echo $_SESSION['ROL']." : ".$_SESSION['Usuario'];?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                                <a class="dropdown-item" style="color:black;" href="Perfil.php"><i class="fas fa-user-cog"></i> Perfil</a>
                                
                            </div>
                        </div>&nbsp;&nbsp;&nbsp;
                        <a href="../Login/Desconectarse.php" data-toggle="modal" data-target="#emergenteLogOut"><i class="fas fa-sign-out-alt"></i>&nbsp;Cerrar sesión</a>&nbsp;&nbsp;&nbsp;   
                    </div>
                </div>
            </nav>
        </div>
        <?php    
        }else{
        ?>
        <!-- ENLACES PARA ESCRITORIO -->
        <div class="d-none d-sm-none d-md-block linksMenu fuenteMenu ">   
            <a href="../Login/Login.php"><i class="fas fa-sign-in-alt"></i>&nbsp;Iniciar Sesión</a>&nbsp;&nbsp;&nbsp;
            <a href="../Registro/Registro.php" ><i class="fas fa-user"></i>  &nbsp;Regístrate</a>&nbsp;&nbsp;        
        </div>    
        <?php
        }
        ?>

       