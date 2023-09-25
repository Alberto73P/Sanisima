<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/Encriptador.php");

    session_start();
    $sesionInactiva = empty($_SESSION["usuario"]);

    if($sesionInactiva){
        header("Location:/");
        die;
    }

    $correo = Encriptador::encriptar($_SESSION["usuario"]);
    $SQL = "DELETE FROM usuarios WHERE userID = '$correo';";
    $conexion->query($SQL);

    session_destroy();
    header("Location:/");
    die;
?>