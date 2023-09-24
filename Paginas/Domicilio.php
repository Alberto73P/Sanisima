<?php 
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");

    session_start();

    if(empty($_SESSION["usuario"])){
        header("Location:/");
        die;
    }

    $colonia = "";
    $calle = "";
    $numeroExterior = "";
    $codigoPostal = "";
    $correo = $_SESSION["usuario"];
    
    $SQL = "SELECT colonia, calle, num_ext, CP FROM usuarios WHERE userID = '$correo';";
    $resultado = $conexion->query($SQL);
    
    if($resultado){
        $fila = $resultado->fetch_row();
        $colonia = $fila[0];
        $calle = $fila[1];
        $numeroExterior = $fila[2];
        $codigoPostal = $fila[3];
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
            <form method="post">
                <div>
                    <label for="txtColonia">Colonia: </label>
                    <input type="text" name="txtColonia" value="<?php echo $colonia; ?>"/>
                </div>
                
                <div>
                    <label for="txtCalle">Calle: </label>
                    <input type="text" name="txtColonia" value="<?php echo $calle; ?>"/>
                </div>
                
                <div>
                    <label for="txtNumeroExterior">No. Exterior: </label>
                    <input type="text" name="txtNumeroExterior" value="<?php echo $numeroExterior; ?>"/>
                </div>

                <div>
                    <label for="txtCP">Codigo Postal: </label>
                    <input type="text" name="txtCP" value="<?php echo $codigoPostal; ?>"/>
                </div>

                <input type="submit" value="Actualizar"/>
            </form>
        </div>

        <div id="Footer">Derechos Reservados. Proyecto escolar del Instituto Tecnologico de Pachuca</div>
    </div>
</body>
</html>