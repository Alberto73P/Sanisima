<?php
require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");

if (!empty($_POST["btnRegistrar"])) {
    if (empty($_POST["txtCorreo"]) and empty($_POST["txtclave"])) {
        $error = "Ha dejado campos vacios";
    }
    else {
        $ID=$_POST["txtCorreo"];
        $clave=$_POST["txtclave"];
        $nom=$_POST["txtNombre"];
        $ape=$_POST["txtApellido"];
        
        $sentencia = $conexion->query("SELECT count(userID) FROM usuarios WHERE userID = '$ID'");

        if($sentencia->fetch_row()[0] > 0){
            $error = "El usuario ya existe";
        }
        else{
            $sentencia = $conexion->prepare("INSERT INTO `usuarios` (`userID`, `password`, `nombre`, `apellido`) VALUES ('$ID', '$clave', '$nom', '$ape')");
        
            $sentencia->execute();
            
            if ($sentencia->affected_rows == 1) {
           header("Location:/");               
            } else {
                $error = " Algo salio mal... Intente de nuevo por favor";            
            }
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
</head>
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
<body>
<div class="login-box">        
    <h1>Sanisima</h1>
	<h2>Registro de Usuario</h2>
    <?php
        if(isset($error)){
            echo "<div class='error-box'>";
            echo $error;
            echo "</div>";
        }
    ?>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
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
		<div class="envioDatos">
            <input type="submit" class="boton" value="Registrarse" name="btnRegistrar" >
        </div>
	</form>
	</div>   
</body>
</html>
