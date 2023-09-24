<?php 
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");

    session_start();

    if(empty($_SESSION["usuario"])){
        header("Location:/");
        die;
    }

    $nombre = "";
    $apellidos = "";
    $telefono = "";
    $correo = $_SESSION["usuario"];
    
    $SQL = "SELECT nombre, apellido, telefono FROM usuarios WHERE userID = '$correo';";
    $resultado = $conexion->query($SQL);
    
    if($resultado){
        $fila = $resultado->fetch_row();
        $nombre = $fila[0];
        $apellidos = $fila[1];
        $telefono = $fila[2];
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

        <div class="BarraLateral">
            <div><a href="/Paginas/Perfil.php">Cuenta</a></div>
            <div><a href="/Paginas/Domicilio.php">Domicilio</a></div>
            <div><a href="/Paginas/MetodosPago.php">Metodos de Pago</a></div>
        </div>

        <div id="contenido_principal">
            <form method="post">
                <div>
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" name="txtNombre" value="<?php echo $nombre; ?>"/>
                </div>
                
                <div>
                    <label for="txtApellidos">Apellidos: </label>
                    <input type="text" name="txtApellidos" value="<?php echo $apellidos; ?>"/>
                </div>
                
                <div>
                    <label for="txtCorreo">Correo: </label>
                    <input type="text" name="txtCorreo" value="<?php echo $correo; ?>"/>
                </div>

                <div>
                    <label for="txtNumeroCel">Telefono: </label>
                    <input type="text" name="txtNumeroCel" value="<?php echo $telefono; ?>"/>
                </div>

                <input type="submit" value="Actualizar"/>
            </form>
        </div>

        <div id="Footer">Derechos Reservados. Proyecto escolar del Instituto Tecnologico de Pachuca</div>
    </div>
</body>
</html>