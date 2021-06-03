<?php
    //CON ESTE IF CONTROLAMOS QUE LOS USUARIOS NO PUEDAN ACCEDER MEDIANTE UN LINK A LAS PAGINAS QUE NO QUEREMOS
    if(!isset($_SERVER['HTTP_REFERER'])){
        header("Location: Home.php");
        exit;
    }
    //LLAMAMOS CON REQUIRE AL CONECTOR DE LA BASE DE DATOS Y A LOS DAO DE FUNCIONES
    require '../../BD/ConectorBD.php';
    require '../../BD/DAOProductos.php';
    //CONECTAMOS A LA BASE DE DATOS
    $conexion=conectar(true);

    //RECOGEMOS  LOS DATOS PROCEDENTES DEL PHP
    $nombre= $_POST['nombre'];
    $categoria= $_POST['categorias'];
    $descripcion= $_POST['descripcion'];
    $precio= $_POST['precio'];
    $stock= $_POST['stock'];
    $imagenProducto=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    // REALIZAMOS LA CONSULTA PARA BUSCAR EL NOMBRE DEL PRODUCTO
    $buscarNombre= buscarProductoPorNombre($conexion, $nombre);

    if(mysqli_num_rows($buscarNombre)!=0){
        // SI EXISTE ESTE NOMBRE REEDIRIGIMOS AL USUARIO CON UN ERROR DE "NOMBRE YA EXISTE"
        header('Location: InsertarNuevoProducto.php?error=nombreExiste');
    }else{
        // SI EL NOMBRE NO EXISTE INSERTAMOS EL PRODUCTO
        $insertarProducto=insertarNuevoProducto($conexion, $nombre, $categoria, $descripcion, $precio, $stock, $imagenProducto);

        header('Location: AdministrarProductos.php');

    }
?>