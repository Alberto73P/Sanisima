<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");

    session_start();
    $sesionInactiva = empty($_SESSION["usuario"]);

    if($sesionInactiva){
        header("Location:/");
        die;
    }

    $correo = $_SESSION["usuario"];
    $SQL = "DELETE FROM usuarios WHERE userID = '$correo';";
    $conexion->query($SQL);

    session_destroy();
    header("Location:/");
    die;
?>