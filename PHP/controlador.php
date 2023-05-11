<?php

    if (!empty($_POST["btnIngresar"])) {
        if (empty($_POST["txtUsuario"]) and empty($_POST["txtclave"])) {
            echo"Datos vacios";
        } else {
            $usuario=$_POST["txtUsuario"];
            $clave=$_POST["txtclave"];
            $sql=$conexion->query(" select * from usuarios where userID = '$usuario' and password = '$clave'");
            if ($datos=$sql->fetch_object()) {
               header("location:../Index.html");                
            } else {
                echo" Acceso Denegado";
            }
            
        }
        
    }
?>

<?php

if (!empty($_POST["btnRegistrar"])) {
    if (empty($_POST["txtCorreo"]) and empty($_POST["txtclave"])) {
        echo"Datos vacios";
    } else {
        $ID=$_POST["txtCorreo"];
        $clave=$_POST["txtclave"];
        $nom=$_POST["txtNombre"];
        $ape=$_POST["txtApellido"];
        $conexion->query(" INSERT INTO `usuarios` (`userID`, `password`, `nombre`, `apellido`) VALUES ('$ID', '$clave', '$nom', '$ape')");
        $sql=$conexion->query(" select * from usuarios where userID = '$ID' and password = '$clave'");
        if ($datos=$sql->fetch_object()) {
           header("location:../Index.html");                
        } else {
            echo" Algo salio mal ";
        }
        
    }
    
}
?>