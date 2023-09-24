<?php
    if(session_status() != PHP_SESSION_ACTIVE){
        session_start();
    }

    $haySesion = !empty($_SESSION["usuario"]);
    $link = "/Paginas/InicioSesion.php";
    $contenido = "Iniciar Sesión";

    if($haySesion){
        $link = "/Paginas/Perfil.php";
        $contenido = "Ver Perfil";
    }
?>

<div id="menu">
    <div id="Marca">
        <img src="/img/Logo.png" width="80" height="80">
        <p>Sanisima</p> 
    </div>
    
    <div id="Paginas">
        <div class="navegador"><a href="/index.php"><p>Inicio</p></a></div>
        <div class="navegador"><a href="/Paginas/Conocenos.php"><p>Conocenos</p></a></div>
        <div class="navegador"><a href="/Paginas/Productos.php"><p>Productos</p></a></div>
        <div class="navegador"><a href="/Paginas/Contacto.php"><p>Contactanos</p></a></div>
        <div class="navegador">
            <a href="<?php echo $link; ?>">
                <p><?php echo $contenido; ?></p>
            </a>
        </div>
        <?php
            if($haySesion){
                echo "<div class='navegador'><a href='/PHP/CerrarSesion.php'><p>Cerrar Sesion</p></a></div>";
            }
        ?>
    </div>

    <div class="icono">
        <img src="/img/icono_menu.png" width="40" height="40" onclick="alternarMenu()">
    </div>
</div>