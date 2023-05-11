<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="../CSS/EstilosLogin.css" type="text/css">
</head>
<style>
    .login-box {
	margin: 50px auto 0px;
    }
</style>
<body>
<div class="login-box">        
    <h1>Sanisima</h1>
	<h2>Registro de Usuario</h2>       
	<form method="post" action="">
        <div class="user-box">
            <input  type="text" name="txtNombre"  required title="Ingresa tu correo"></input>
			<label>Nombre</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtApellido"  required title="Ingresa tu correo"></input>
			<label>Apellido</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtCorreo"  required title="Ingresa tu correo"></input>
			<label>Correo electrónico</label>
		</div>
		<div class="user-box">
            <input  type="password" name="txtclave"  required ></input>
			<label>Contraseña</label>
		</div>
        <?php
          include("../PHP/conexion.php");
          include("../PHP/controlador.php");
        ?>
		<div class="envioDatos">
            <input type="submit" class="boton" value="Registrarse" name="btnRegistrar" >
        </div>
	</form>
	</div>   
</body>
</html>
