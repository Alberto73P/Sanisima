<?php
require($_SERVER["DOCUMENT_ROOT"] . "/PHP/conexion.php");
require($_SERVER["DOCUMENT_ROOT"] . "/PHP/Encriptador.php");

session_start();

if (!empty($_POST["btnRegistrar"])) {
    $hayCamposVacios = empty($_POST["txtNombre"]) || 
        empty($_POST["txtApellido"]) || empty($_POST["txtCorreo"]) ||
        empty($_POST["txtClave"]) || empty($_POST["txtNumeroCel"]) ||
        empty($_POST["txtCP"]) || empty($_POST["txtColonia"]) ||
        empty($_POST["txtCalle"]) || empty($_POST["txtNumeroExt"]) ||
        empty($_POST["txtFechaNac"]);
    
    if ($hayCamposVacios) {
        $error = "Ha dejado campos vacios";
    }
    else if($_POST["ckTerminos"] != "on"){
        $error = "Debe aceptar los terminos y condiciones";
    }
    else {
        $celular = Encriptador::encriptar($_POST["txtNumeroCel"]);
        $CP = $_POST["txtCP"];
        $colonia = $_POST["txtColonia"];	
        $correo = Encriptador::encriptar($_POST["txtCorreo"]);
        $clave = Encriptador::encriptarClave($_POST["txtClave"]);
        $nombre = Encriptador::encriptar($_POST["txtNombre"]);
        $apellidos = Encriptador::encriptar($_POST["txtApellido"]);
        $calle = Encriptador::encriptar($_POST["txtCalle"]);
        $fechaNacimiento = $_POST["txtFechaNac"];
        $numeroExterior = Encriptador::encriptar($_POST["txtNumeroExt"]);
        
        $sentencia = $conexion->query("SELECT count(userID) FROM usuarios WHERE userID = '$correo'");

        if($sentencia->fetch_row()[0] > 0){
            $error = "El usuario ya existe";
        }
        else{
            $SQL = "INSERT INTO `usuarios` (`userID`, `password`, `nombre`, `apellido`,`telefono`,`colonia`,`calle`,`num_ext`,`CP`,`fecha_nac`, `fecha_reg`) 
                VALUES ('$correo', '$clave', '$nombre', '$apellidos','$celular','$colonia','$calle','$numeroExterior',$CP,'$fechaNacimiento', CURDATE())";
            $sentencia = $conexion->prepare($SQL);
            $sentencia->execute();
            
            if ($sentencia->affected_rows == 1) {
                $_SESSION["usuario"] = Encriptador::desencriptar($correo);
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
	margin: 10px auto ;
    width: 80%;
    }
    .error-box{
        background-color: rgba(255, 102, 102,0.5);
        padding: 1em;
        border: 1px solid black;
        border-radius: 0.2em;
    }
    .user-box{        
	    width: 40%;
        margin: auto;
    }
    #TyC{
        display: flex;
        justify-content: center;
    }
    #registro{
        display: flex;
        flex-wrap: wrap;
	    justify-content: center;        
    }
</style>
<body>
<div class="login-box" id="form_registro">        
    <h1>Sanisima</h1>
	<h2>Registro de Usuario</h2>
    <?php
        if(isset($error)){
            echo "<div class='error-box'>";
            echo $error;
            echo "</div>";
        }
    ?>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="registro">
        <div class="user-box">
            <input  type="text" name="txtNombre"  required title="Ingresa tu correo"></input>
			<label class="etiqueta">Nombre</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtApellido"  required title="Ingresa tu correo"></input>
			<label class="etiqueta">Apellido</label>
		</div>
        <div class="user-box">
            <input  type="email" name="txtCorreo"  required title="Ingresa tu correo"></input>
			<label class="etiqueta">Correo electrónico</label>
		</div>
		<div class="user-box">
            <input  type="password" name="txtClave"  required ></input>
			<label class="etiqueta">Contraseña</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtNumeroCel" pattern="[0-9]*" required title="Ingresa Numero de telefono"></input>
			<label class="etiqueta">Numero telefónico :</label>
		</div>
        <div class="user-box">
            <input  type="number" name="txtCP"  required title="Código Postal"></input>
			<label class="etiqueta">Código Postal</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtColonia"  required title="Ingresa Colonia"></input>
			<label class="etiqueta">Colonia :</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtCalle"  required title="Ingresa Calle"></input>
			<label class="etiqueta">Calle :</label>
		</div>
        <div class="user-box">
            <input  type="text" name="txtNumeroExt"  required title="Ingresa Numero"></input>
			<label class="etiqueta">Numero ext:</label>
		</div>
        <div class="user-box">
            <input  type="date" name="txtFechaNac"  required title="Fecha de Nacimiento"></input>
			<label class="etiquetaSinEvento">Fecha de Nacimiento</label>
		</div>
        <div id="TyC">
            <input  type="checkbox" name="ckTerminos" required ></input>
            <label>He leido y acepto el  <a href="/Archivos/Aviso_de_privacidad_Sanisima.pdf" target="_blank" > aviso de privacidad</a> </label> 
		</div>
		<div class="envioDatos">
            <input type="submit" class="boton" value="Registrarse" name="btnRegistrar" >
        </div>
	</form>
	</div>   
</body>
</html>
