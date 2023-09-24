<?php
require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");

session_start();

if (!empty($_POST["btnIngresar"])) {
    if (empty($_POST["txtUsuario"]) || empty($_POST["txtclave"])) {
        $error = "Datos faltantes";
    }
    else {    
        $usuario=$_POST["txtUsuario"];
        $clave=$_POST["txtclave"];
        $sql=$conexion->query(" select * from usuarios where userID = '$usuario' and password = '$clave'");
            
        if ($datos=$sql->fetch_object()) {
            $_SESSION["usuario"] = $usuario;
            header("Location:/");
            die;
        } else {
            $error = "Acceso Denegado";
        }    
    }    
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../CSS/EstilosLogin.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Fuentes.css" type="text/css">

    <style>
        .login-box {
            margin: 50px auto 0px;
        }
        
        .error-box{
            background-color: rgba(255, 102, 102,0.5);
            padding: 1em;
            border: 1px solid black;
            border-radius: 0.2em;
        }
    </style>

</head>
<body>
<div class="login-box">        
    <h1>Sanisima</h1>
	<h2>Iniciar sesión</h2>
    
    <?php
        if(isset($error)){
            echo "<div class='error-box'>";
            echo $error;
            echo "</div>";
        }
    ?>

	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="user-box">
            <input  type="text" name="txtUsuario"  required="" ></input>
			<label class="etiqueta">Nombre de Usuario</label>
		</div>
			<div class="user-box">
                <input  type="password" name="txtclave"  required="" ></input>
				<label class="etiqueta">Contraseña</label>
			</div>
		<div class="envioDatos">
            <input type="submit" class="boton" value="Iniciar Sesion" name="btnIngresar">
            <a href="Registro.php" class="boton">Registrarse</a>
            <!--<input type="submit" class="boton" value="Registrarse" name="btnRegistrar">-->
        </div>
	</form>
	</div>   
</body>
</html>
