<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanisima</title>
    <link rel="stylesheet" href="CSS/Fuentes.css" type="text/css">
    <link rel="stylesheet" href="CSS/Estilos.css" type="text/css">
    <link rel="stylesheet" href="CSS/EstilosInicio.css" type="text/css">
    <script src="JS/menu.js"></script>
</head>
<body>
    <div class="ContenedorMadre">
        
        <?php require($_SERVER["DOCUMENT_ROOT"] . "/Paginas/Encabezado.php");?>

        <div class="contenido_principal">
            <div id="Inicio"><p>Comer es una necesidad, hacerlo de forma inteligente es un arte.</p> </div>
            <div id="Conocenos" class="Contenedor">
                <div class="Info">
                    <div class="Titulo"><p>¿Quienes Somos?</p></div>
                    <div class="Descripcion" id="quienesSomos">
                        <p> Conoce la misión y objetivos que distiguen a Sanisima</p>
                    </div>
                </div>
                
                <div class="Info">
                    <div class="Titulo"><p>De la Tierra a tu mesa</p></div>
                    <div class="Descripcion" id="Delatierra">
                        <p>Para  nosotros es importante la calidad de nuestros productos, te contamos como lo hacemmos...</p>                     
                    </div>
                </div>
                
                <div class="Info">
                    <div class="Titulo"><p>Algo mas que comida</p></div>
                    <div class="Descripcion" id="algomas">
                          <p>Dentro del propósito de Sanisima destaca la Contribución social...</p>  
                    </div>
                </div>
            </div>
            
            <div id="Productos" class="Contenedor">
                <div class="Info">
                    <div class="Titulo"><p>Promociones del dia !</p></div>
                    <div class="Descripcion" id="Promos">
                        <p>Prueba nuestro sandwich de Salmón! x $60</p>                    
                    </div>
                </div>
                
                <div class="Info">
                    <div class="Titulo"><p> Bebidas del dia </p></div>
                    <div class="Descripcion" id="Menu">
                        <p>Licuado de Platano con Fresa y vainilla x $30</p>                    
                    </div>
                </div>
                
                <div class="Info">
                    <div class="Titulo"><p> Horario  </p></div>
                    <div class="Descripcion" id="extra">
                        <p>Abierto de Lunes a sabdo en horario de 8:00 hrs a 20:00 hrs</p>                    
                    </div>
                </div>
            </div>
        </div>
        <div id="Footer">Derechos Reservados. Proyecto escolar del Instituto Tecnologico de Pachuca</div>
    </div>
</body>
</html>