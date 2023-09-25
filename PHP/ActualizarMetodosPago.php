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

    $cuenta = Encriptador::encriptar($_POST["txtCuenta"]);
    $fechaCaducidad = $_POST["txtFechaCad"];
    $codigoSeguridad = $_POST["txtCodigoSeguridad"];
    $correo = Encriptador::encriptar($_SESSION["usuario"]);

    $SQL = "SELECT * FROM metodos_pago WHERE usuario = '$correo';";
    $resultado = $conexion->query($SQL);

    if($resultado->num_rows > 0){
        $SQL = "UPDATE metodos_pago 
        SET `cuenta` = '$cuenta',
        `fecha_caducidad` = '$fechaCaducidad',
        `codigo_seguridad` = '$codigoSeguridad'  
        WHERE `usuario` = '$correo';";

        $conexion->query($SQL);

        header("Location:/Paginas/MetodosPago.php");
        die;
    }

    $SQL = "INSERT INTO metodos_pago (`cuenta`,`fecha_caducidad`,`codigo_seguridad`,`usuario`) 
        VALUES ('$cuenta','$fechaCaducidad','$codigoSeguridad','$correo')";
    
    $conexion->query($SQL);
    
    header("Location:/Paginas/MetodosPago.php");
    die;
?>