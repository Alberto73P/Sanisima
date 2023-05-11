<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../CSS/EstilosLogin.css" type="text/css">
    <link rel="stylesheet" href="../CSS/Fuentes.css" type="text/css">
</head>
<body>
<div class="login-box">        
    <h1>Sanisima</h1>
	<h2>Iniciar sesión</h2>       
	<form method="post" action="">
        <div class="user-box">
            <input  type="text" name="txtUsuario"  required="" ></input>
			<label>Nombre de Usuario</label>
		</div>
			<div class="user-box">
                <input  type="password" name="txtclave"  required="" ></input>
				<label>Contraseña</label>
			</div>
        <?php
          include("../PHP/conexion.php");
          include("../PHP/controlador.php");
        ?>
		<div class="envioDatos">
            <input type="submit" class="boton" value="Iniciar Sesion" name="btnIngresar">
            <a href="Registro.php" class="boton">Registrarse</a>
            <!--<input type="submit" class="boton" value="Registrarse" name="btnRegistrar">-->
        </div>
	</form>
	</div>   
</body>
</html>
