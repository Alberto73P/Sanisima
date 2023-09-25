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

    $cp = $_POST["txtCP"];
    $colonia = $_POST["txtColonia"];
    $calle = Encriptador::encriptar($_POST["txtCalle"]);
    $numeroExterior = Encriptador::encriptar($_POST["txtNumeroExterior"]);
    $correo = Encriptador::encriptar($_SESSION["usuario"]);

    $SQL = "UPDATE usuarios 
        SET `CP` = $cp,
        `colonia` = '$colonia',
        `calle` = '$calle',
        `num_ext` = '$numeroExterior' 
        WHERE `userID` = '$correo';";

    $operacionExitosa = $conexion->query($SQL);

    header("Location:/Paginas/Domicilio.php");
    die;
?>