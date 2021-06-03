<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
  
  //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOs DAO DE FUNCIONES
  require '../../BD/ConectorBD.php';
  require '../../BD/DAOUsuarios.php';
  require '../../BD/DAOProductos.php';
  require '../../BD/Config.php';
  //CONECTAMOS A LA BASE DE DATOS
  $conexion=conectar(true);
  //INICIAMOS SESION 
  session_start();  

  // COMPROBAMOS SI EL USUARIO ESTA CONECTADO  
  if($_SESSION['usuarioConectado']==false){
   
      
  }
  // SI EL USUARIO HA INICIADO SESSION REALIZAMOS LO SIGUIENTE
  elseif($_SESSION['usuarioConectado']==true){
    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $idProducto= $_POST['idProducto'];
    $precio= $_POST['precio'];
    $cantidad= $_POST['cantidad'];
    $stock= $_POST['stock'];
    $idCesta=$_SESSION['idUsuario'];

    // REALIZAMOS LA CONSULTA PARA BUSCAR LOS PRODUCTOS DEL CARRITO DEL USUARIO
    $comprobarProducto=buscarProductosEnElCarrito2($conexion, $idProducto, $idCesta);
    //GENERAMOS EL ARRAY
    $product=mysqli_fetch_assoc($comprobarProducto);
    // COMO ES UN ARRAY LA CANTIDAD EMPEZARA EN LA POSICION 0 POR ESO HACEMOS ESTE CONTROL
    if($cantidad==0){
      $cantidad+=1;
    }
    // AQUÍ CONTROLAMOS SI EL USUARIO HA EXCEDIDO EL STOCK DEL PRODUCTO
    if($product['Cantidad']>=$stock){
      echo 'Has excedido el stock';
    }
    // SI EL STOCK ES CERO NO HACEMOS NADA
    elseif($stock==0){
      
    }
    // EN CASO DE QUE EL PRODUCTO TENGA STOCK QUE HAGA LO SIGUIENTE
    else{
    //COMPROBAMOS SI EL PRODUCTO YA EXISTE EN EL CARRITO 
    if(mysqli_num_rows($comprobarProducto)!=0 ){
      //SI EXISTE ACTIALIZAMOS LA CANTIDAD
      $idItem=$product['idItem'];
      $cantidadP=$product['Cantidad'];
      $actualizar=actualizarCantidadProductosEnElCarrito($conexion, $idItem, $cantidadP);
      
    }
    else{
      // SI NO EXISTE INSERTAMOS UN NUEVO PRODUCTO
      $añadirProductosAlCarrito= añadirProductosAlCarrito($conexion,$cantidad, $precio, $idCesta, $idProducto);
      
    }
    
    }  

  }
      


?>