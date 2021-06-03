<?php
    // TRAEMOS LA SESION
    session_start();
    // Y LA DESTRUIMOS
    session_destroy();

    header('Location:../InterfazWeb/Home.php');


?>