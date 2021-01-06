<?php session_start();
# para las vistas que son administradores, este codigo evita que ingresen los usuarios mortales :)
  if ($_SESSION == false) {
      header('Location: index.php');
  }
 ?>
 <!doctype html>
<html lang="es-AR">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <title>Cámara de Comercio e Industria de Posadas</title>
    <link rel="shortcut icon" href="images/favicon.png">
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/android-desktop.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="../material.css">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="../getmdl-select.min.css">
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
                                <h3>Adherirse a eventos</h3>
                                <h5>Desde aquí podrás enviar peticiones para ser parte de eventos o ver el estado de cada evento.</h5>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                    <div class="mdl-card__title mdl-card--expand">
                                        <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                                            <thead>
                                                <tr>
                                                    <th class="mdl-data-table__cell--non-numeric">Nombre del Evento</th>
                                             
                                                    <th>Ser parte del evento</th>
                                                </tr>
                                            </thead>
                                            <?php
                                    include_once("../controller/EventoController.php");
                                    $EventoController=new EventoController();
                                    $resultado=$EventoController->listar();
                                    if (isset($resultado)) {
                                        while ($muestra = mysqli_fetch_array($resultado)) {
                                            ?>
                                                <tbody>
                                                    <tr>
                                                       
                                                        <td class="mdl-data-table__cell--non-numeric">
                                                            <?php echo $muestra['nombre']; ?>
                                                        </td>
                                                        <td>
                                                            <?php
														  include_once("../controller/EmpresaEventoController.php");
														  $EmpresaEventoController=new EmpresaEventoController();
														  $resultadoEmpresaEventoController=$EmpresaEventoController->listarEmpresaEventoController($muestra['id_evento'], $_SESSION['id_empresa']);
														  $centinela_de_control=0;
															  while ($muestraEmpresaEventoController = mysqli_fetch_array($resultadoEmpresaEventoController)) {
																$centinela_de_control=1;
															?>
                                                                    <?php if( isset($muestraEmpresaEventoController) and $muestraEmpresaEventoController['estado']==1 ){?>
                                                                        Participa del evento.
                                                                       
                                                                    <?php }else { ?>
                                                                        En espera.
                                                                           
                                                                    <?php } ?>
                                                                              
                                                               
                                                                <?php

                                      }
                                      if ( $centinela_de_control==0) {?>
                                       
										
										<form action="../controller/EmpresaEventoController2.php" method="post">
											<input type="hidden" name="operacion" value="ser-parte">
											<input type="hidden" name="id_evento" value="<?php echo $muestra['id_evento'];?>">
											<button class="mdl-button mdl-js-button mdl-button--icon">
											  <div id="ser-parte-<?php echo $muestra['id_evento'];?>" class="icon material-icons">add</div>
											  <div class="mdl-tooltip mdl-tooltip--large" for="ser-parte-<?php echo $muestra['id_evento'];?>">ser parte</div>
											</button>
										</form>







										<?php
                                      }

                                      ?>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php
                                        };
                                    }
                                    ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include_once("parts/preguntas_frecuentes.php"); ?>
                    </div>
                </main>
        </div>

        <script src="../material.js"></script>
        <script src="../getmdl-select.min.js"></script>
        <script>
            var fileInputTextDiv = document.getElementById('file_input_text_div');
            var fileInput = document.getElementById('imagen');
            var fileInputText = document.getElementById('file_input_text');

            fileInput.addEventListener('change', changeInputText);
            fileInput.addEventListener('change', changeState);

            function changeInputText() {
                var str = fileInput.value;
                var i;
                if (str.lastIndexOf('\\')) {
                    i = str.lastIndexOf('\\') + 1;
                } else if (str.lastIndexOf('/')) {
                    i = str.lastIndexOf('/') + 1;
                }
                fileInputText.value = str.slice(i, str.length);
            }

            function changeState() {
                if (fileInputText.value.length != 0) {
                    if (!fileInputTextDiv.classList.contains("is-focused")) {
                        fileInputTextDiv.classList.add('is-focused');
                    }
                } else {
                    if (fileInputTextDiv.classList.contains("is-focused")) {
                        fileInputTextDiv.classList.remove('is-focused');
                    }
                }
            }
        </script>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    </html>