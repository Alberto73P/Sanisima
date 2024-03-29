<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contactanos</title>
        <link rel="stylesheet" href="../CSS/Estilos.css"/>
        <link rel="stylesheet" href="../CSS/Fuentes.css"/>

        <style>
            .ContenedorMadre{
                height: 100%;
                display: grid;
                grid-template-areas:'barra'
                        'contenido'
                        'footer';  
                background-color: #FFFFFF;
            }

            #ContenidoPrincipal{
                padding-left: 25px;
                grid-area: contenido;
            }

            .titulo_seccion{
                padding-bottom: 20px;
                width: 90%;
                font-size: 32px;
                color: var(--color-titulos);
                border-bottom: 4px solid darkblue;
            }

            .mapa{
                margin-left: 50px;
                width: 300px;
                height: 300px;
            }

            .formulario_registro{
                min-height: 50px;
                margin: 15px 0;
            }

            .formulario_campo{
                height: 35px;
            }

            .formulario_textarea{
                margin-left: 60px;
                height: 200px;
                width: 600px;
                display: block;
            }

            .formulario_boton-envio{
                height: 35px;
                width: 100px;
                background-color: var(--color-fondo-primario);

                font-size: 20px;
                font-weight: bold;
                font-family: Handmade;
            }
        </style>
    </head>
    <body>
        <div class="ContenedorMadre">
            
            <?php require($_SERVER["DOCUMENT_ROOT"] . "/Paginas/Encabezado.php");?>
            
            <div id="ContenidoPrincipal">
                <h2 class="titulo_seccion">Contactanos</h2>
                
                <p>Numero de Telefono: 123-456-7890</p>
                <p>Ubicacion:</p>
                
                <iframe class="mapa" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4859.895480762973!2d-98.77976990124658!3d20.07173183731833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1679947673630!5m2!1ses-419!2smx" 
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                
                <form id="formulario">
                    <h2 class="titulo_seccion">Envianos un mensaje!</h2>

                    <div class="formulario_registro">
                        <label>Correo:</label>
                        <input class="formulario_campo" type="email"/>
                    </div>

                    <div class="formulario_registro">
                        <label>Mensaje:</label>
                        <textarea class="formulario_textarea" form="formulario"></textarea>
                    </div>

                    <div class="formulario_registro">
                        <input class="formulario_boton-envio" type="submit"/>
                    </div>
                </form>
            </div>
            <div id="Footer">Derechos Reservados</div>
        </div>
    </body>
</html>