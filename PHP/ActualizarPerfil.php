<?php
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/Encriptador.php");

    session_start();

    $sesionInactiva = empty($_SESSION["usuario"]);
    $datosNoRecibidos = empty($_POST["sbActualizar"]);

    if($sesionInactiva || $datosNoRecibidos){
        header("Location:/");
        die;
    }

    $nombre = Encriptador::encriptar($_POST["txtNombre"]);
    $apellidos = Encriptador::encriptar($_POST["txtApellidos"]);
    $telefono = Encriptador::encriptar($_POST["txtNumeroCel"]);
    $viejoCorreo = $_SESSION["usuario"];
    $nuevoCorreo = $_POST["txtCorreo"];
    $cambioCorreo = $viejoCorreo != $nuevoCorreo;

    $SQL = "UPDATE usuarios 
        SET `nombre` = '$nombre',
        `apellido` = '$apellidos',
        `telefono` = '$telefono'";

    if($cambioCorreo){
        $nuevoCorreo = Encriptador::encriptar($nuevoCorreo);
        $SQL .= ", `userID` = '$nuevoCorreo'";
    }

    $viejoCorreo = Encriptador::encriptar($viejoCorreo);
    $SQL .= " WHERE `userID` = '$viejoCorreo';";

    $operacionExitosa = $conexion->query($SQL);

    if($operacionExitosa && $cambioCorreo){
        $_SESSION["usuario"] = Encriptador::desencriptar($nuevoCorreo);
    }

    header("Location:/Paginas/Perfil.php");
    die;
?>