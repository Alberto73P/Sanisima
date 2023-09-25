<?php 
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/Encriptador.php");
    
    session_start();

    if(empty($_SESSION["usuario"])){
        header("Location:/");
        die;
    }

    $cuenta = "";
    $fechaCaducidad = "";
    $codigoSeguridad = "";
    $correo = Encriptador::encriptar($_SESSION["usuario"]);
    
    $SQL = "SELECT cuenta, fecha_caducidad, codigo_seguridad FROM metodos_pago WHERE usuario = '$correo';";
    $resultado = $conexion->query($SQL);
    
    if($resultado->num_rows > 0){
        $fila = $resultado->fetch_row();
        $cuenta = Encriptador::desencriptar($fila[0]);
        $fechaCaducidad = $fila[1];
        $codigoSeguridad = $fila[2];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="/CSS/Fuentes.css" type="text/css">
    <link rel="stylesheet" href="/CSS/Estilos.css" type="text/css">
    <link rel="stylesheet" href="/CSS/EstilosInicio.css" type="text/css">
    <link rel="stylesheet" href="/CSS/EstilosUsuario.css" type="text/css">
    <script src="JS/menu.js"></script>
</head>
<body>
    <div class="ContenedorMadre">
        
        <?php require($_SERVER["DOCUMENT_ROOT"] . "/Paginas/Encabezado.php");?>
        <?php require($_SERVER["DOCUMENT_ROOT"] . "/Paginas/BarraLateral.html");?>

        <div id="contenido_principal">
            <form method="post" action="/PHP/ActualizarMetodosPago.php">
                <div>
                    <label for="txtCuenta">Cuenta: </label>
                    <input type="text" name="txtCuenta" value="<?php echo $cuenta; ?>"/>
                </div>
                
                <div>
                    <label for="txtFechaCad">Fecha de caducidad: </label>
                    <input type="date" name="txtFechaCad" value="<?php echo $fechaCaducidad; ?>"/>
                </div>
                
                <div>
                    <label for="txtCodigoSeguridad">CVV: </label>
                    <input type="text" name="txtCodigoSeguridad" value="<?php echo $codigoSeguridad; ?>"/>
                </div>

                <input type="submit" name="sbActualizar" value="Actualizar"/>
            </form>
        </div>

        <div id="Footer">Derechos Reservados. Proyecto escolar del Instituto Tecnologico de Pachuca</div>
    </div>
</body>
</html>