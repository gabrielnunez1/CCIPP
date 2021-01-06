<?php session_start(); 
   if ($_SESSION == false) {
       header('Location: index.php');
     }?>
   <!doctype html>
<html lang="es-AR">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Cámara de Comercio e Industria de Posadas</title>
    <link rel="shortcut icon" href="images/favicon.png">
        <!-- Add to homescreen for Chrome on Android -->
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/android-desktop.png">
        <!-- Add to homescreen for Safari on iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
        <!-- Tile icon for Win8 (144x144 + tile color) -->
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">
        
        <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
        <!--
         <link rel="canonical" href="http://www.example.com/">
         -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="../material.css">
        <link rel="stylesheet" href="styles.css">
        <style>
            #view-source {
                position: fixed;
                display: block;
                right: 0;
                bottom: 0;
                margin-right: 40px;
                margin-bottom: 40px;
                z-index: 900;
            }
        </style>
    </head>

    <body>
        <div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
            <?php include_once("parts/admin_panel_nav.php"); ?>
                <main class="mdl-layout__content mdl-color--grey-100">
                    <div class="mdl-grid demo-content">
                        <style>
                            .demo-charts {
                                color: #fff;
                                background: url("images/tendencias.png") bottom right 15% no-repeat #46B6AC;
                            }
                        </style>
                        <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
                            <div class="mdl-card__supporting-text mdl-color-text--blue-grey-90">
                                <h3>Gestión de comercio</h3>
                                <h5>Selecciona una de las siguientes opciones para tener mas detalles y Gestiónar los comercios.</h5>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                    <div class="mdl-tabs__tab-bar">
                                        <a href="#administrar-empresa" class="mdl-tabs__tab is-active">Administrar</a>
                                    </div>
                                    <div class="mdl-tabs__panel is-active" id="administrar-empresa">
                                        <div class="mdl-card__title mdl-card--expand">

                                            <div class="android-card-container mdl-grid">

                                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                                                        <div class="mdl-card__title">
                                                            <h4 class="mdl-card__title-text">Mostrar todos los usuarios</h4>
                                                        </div>
                                                        <div class="mdl-card__supporting-text">Desde aquí podrás ver todos los usuarios independientemente del evento al que se hayan registrado</div>
                                                        <div class="mdl-card__actions">
                                                            <form action="../view/admin_panel_comerciante_todos.php" method="post">
                                                                <input type="hidden" name="operacion" value="listartodoscomercios">
                                                                <button class="mdl-button mdl-js-button mdl-button">
                                                                    <div id="vertodo">Ver lista</div>
                                                                </button>
                                                            </form>
                                                            <form action="../controller/ControllerDescargas.php" method="post">
                                                                <input type="hidden" name="operacion" value="descargar">
                                                                <input type="hidden" name="tipo" value="todoslosusuarios">
                                                                <button class="mdl-button mdl-js-button mdl-button">
                                                                    <div id="vertodo">descargar</div>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>




                                                     <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                                                        <div class="mdl-card__title">
                                                            <h4 class="mdl-card__title-text">Club de descuentos</h4>
                                                        </div>
                                                        <div class="mdl-card__supporting-text">Desde aquí podrás ver todos los usuarios del club de descuentos.</div>
                                                        <div class="mdl-card__actions">
                                                            <form action="../view/admin_panel_club_de_descuentos.php" method="post">
                                                                <input type="hidden" name="operacion" value="clubdedescuentos">
                        
                                                                <button class="mdl-button mdl-js-button mdl-button">
                                                                    <div id="vertodo">Ver lista</div>
                                                                </button>
                                                            </form>
                                                            <form action="../controller/ControllerDescargas.php" method="post">
                                                                <input type="hidden" name="operacion" value="descargar">
                                                                <input type="hidden" name="tipo" value="clubdedescuentos">
                                                                <button class="mdl-button mdl-js-button mdl-button">
                                                                    <div id="vertodo">descargar</div>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>









                              <?php
                                    include_once("../controller/EventoController.php");
                                    $EventoController=new EventoController();
                                    $resultado=$EventoController->listar();
                                    if(isset($resultado)){
                                      while ($muestra = mysqli_fetch_array($resultado)) { ?>
                                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                                                        <div class="mdl-card__title">
                                                            <h4 class="mdl-card__title-text"><?php echo $muestra['nombre'];?></h4>
                                                        </div>
                                                        <div class="mdl-card__supporting-text">
                                                            <?php echo  $muestra['descripcion'];?>
                                                        </div>
                                                        <div class="mdl-card__actions">
                                                            <form action="../view/admin_panel_comerciante.php" method="post">
                                                                <input type="hidden" name="operacion" value="listarcomercios">
                                                                <input type="hidden" name="id_evento" value="<?php echo  $muestra['id_evento'];?>">
                                                                <input type="hidden" name="nombre_evento" value="<?php echo  $muestra['nombre'];?>">
                                                                <button class="mdl-button mdl-js-button mdl-button">
                                                                    <div id="ver<?php echo  $muestra['id_evento'];?>">Ver lista</div>
                                                                </button>
                                                            </form>

                                                            <form action="../controller/ControllerDescargas.php" method="post">
                                                                <input type="hidden" name="operacion" value="descargar">
                                                                <input type="hidden" name="id_evento" value="<?php echo  $muestra['id_evento'];?>">
                                                                <input type="hidden" name="tipo" value="evento">
                                                                <button class="mdl-button mdl-js-button mdl-button">
                                                                    <div id="vertodo">descargar</div>
                                                                </button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                    <?php
                                        };
                                      }
                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include_once("parts/preguntas_frecuentes.php"); ?>
                    </div>
                </main>
        </div>
        <script src="../material.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    </body>

    </html>