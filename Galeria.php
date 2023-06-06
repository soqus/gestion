<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--LINKS-->
    <link rel="stylesheet" href="cssMainGaleria.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">

</head>
<body>
    <!--navigation-->
    <header class="sticky">
        <a href="index.php" class="logo">PodoClear<span>.</span></a>
        <div class="menuToggle" onclick="toggleMenu();"></div>
        <ul class="navigation">
            <li><a href="index.php#banner" onclick="toggleMenu();">Inicio</a></li>
            <li><a href="index.php#acerca" onclick="toggleMenu();">Acerca de Dra.</a></li>
            <li><a href="informate.php" onclick="toggleMenu();">Informate</a></li>
            <li><a href="AgendarHora.php" onclick="toggleMenu();">Atencion</a></li>
            <li><a href="index.php#contacto" onclick="toggleMenu();">Contacto</a></li>
            <li><a href="Galeria.php" onclick="toggleMenu();">Galeria</a></li>
            <li><?php if (isset($_SESSION['usuario'])) {
                // Sesión activa, mostrar botón "Cerrar sesión"
                echo '<a href="vista_medica.php" onclick="toggleMenu();">Apartado médico</a>';
            }
            ?>
            </li>
        </ul>
        <div>
            <?php
            
            /*if para mostrar boton de cerrar sesion e iniciar sesion segun corresponda */
            if(isset($_SESSION['usuario'])) {
                // Sesión activa, mostrar botón "Cerrar sesión"
                echo '<button onclick="cerrar_sesion()">Cerrar sesión</button>';
            } else {
                // Sin sesión activa, mostrar botón "Iniciar sesión"
                echo '<button onclick="iniciar_sesion()" >Iniciar sesión</button>';
            }
            ?>
        </div>
    </header>

    <!--main-->
    <main>
        <section class="gallery" id="portafolio">
            <div class="contenedor">
                <h2 class="subtitulo">Antes</h2>
                <!--galeria de fotos antes-->
                <div class="contenedor-galeria">
                    <img src="img/uno_mal.jpg" alt="" class="img-galeria">
                    <img src="img/dos_mal.jpg" alt="" class="img-galeria">
                    <img src="img/tres_mal.jpg" alt="" class="img-galeria">
                    <img src="img/cuatro_mal.jpg" alt="" class="img-galeria">
                    <img src="img/cinco_mal.jpg" alt="" class="img-galeria">
                    <img src="img/seis_mal.jpg" alt="" class="img-galeria">
                </div>
                <h2 class="subtitulo">Despues</h2>
                <!--galeria de fotos Despues-->
                <div class="contenedor-galeria">
                    <img src="img/bien_1.jpg" alt="" class="img-galeria">
                    <img src="img/dos_bien.jpg" alt="" class="img-galeria">
                    <img src="img/tres_bien.jpg" alt="" class="img-galeria">
                    <img src="img/cuatro_bien.jpg" alt="" class="img-galeria">
                    <img src="img/cinco_bien.jpg" alt="" class="img-galeria">
                    <img src="img/seis_bien.jpg" alt="" class="img-galeria">
                </div>
            </div>
        </section>
        
        <section class="imagen-light">
            <img src="img/Closelight.svg" alt="" class="close">
            <img src="" alt="" class="" class="agregar-imagen">
        </section> 
    </main>

    <script src="headerGaleria.js"></script>
    <script src=funciones.js></script>
</body>
</html>