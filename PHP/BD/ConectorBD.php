<?php

function conectar($remota){
    if($remota){
        $servidor="bdabdeselamelfarhaouianas.c0ezwgzgfplt.eu-west-3.rds.amazonaws.com";
        $usuario="Anas";
        $password="anas221001";
        $BD="TiendaMerchandising";
    }else{
        echo("No se ha podido conectar a la Base de Datos.");
    }

    $conexion=  mysqli_connect($servidor,$usuario,$password,$BD);

    if(!$conexion){
        echo mysqli_connect_error();
        echo "Estado: </strong>"."Desconectado a la BD<br>";
        return false;
    }else{
      
        return $conexion;
    }
}

?>