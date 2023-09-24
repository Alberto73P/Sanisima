<?php 
    require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");

    session_start();

    if(empty($_SESSION["usuario"])){
        header("Location:/");
        die;
    }

    $eliminacionConfirmada = !empty($_POST["ckConfirmacion"]) && $_POST["ckConfirmacion"] == "on";

    if($eliminacionConfirmada){
        header("Location:/PHP/EliminarCuenta.php");
        die;
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
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <div>
                    <p>
                        La eliminacion de la cuenta es una accion permanente que elimina 
                        todos los datos <br> almacenados sobre usted. 
                        Esta seguro de que desea eliminar su cuenta?
                    </p>
                </div>
                
                <div>
                    <label for="ckConfirmacion">Deseo eliminar mi cuenta</label>
                    <input type="checkbox" name="ckConfirmacion"/>
                </div>

                <input type="submit" value="Eliminar Cuenta"/>
            </form>
        </div>

        <div id="Footer">Derechos Reservados. Proyecto escolar del Instituto Tecnologico de Pachuca</div>
    </div>
</body>
</html>