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
        <meta name="mobile-web-app-capable" content="yes">
        <link rel="icon" sizes="192x192" href="images/android-desktop.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="Material Design Lite">
        <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">
        <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
        <meta name="msapplication-TileColor" content="#3372DF">
        <link rel="shortcut icon" href="images/favicon.png">
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
                                <h3>Gestión del club de descuentos</h3>
                                <h5>Desde aquí podrás habilitar o deshabilitar los comercios del club de descuento.</h5>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                                    <div class="mdl-tabs__tab-bar">
                                        <a href="#administrar-empresa" class="mdl-tabs__tab is-active">Administrar <?php if ($_POST['nombre_evento']) { echo $_POST['nombre_evento'];} ?></a>
                                    </div>
                                    <div class="mdl-tabs__panel is-active" id="administrar-empresa">
                                        <div class="mdl-card__title mdl-card--expand">
                                            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                                                <thead>
                                                    <tr>
                                                        <th class="mdl-data-table__cell--non-numeric">Nombre fantasia</th>
                                                        <th class="mdl-data-table__cell--non-numeric">Número socio</th>
                                                        <th>Telefono</th>
                                                        <th>Estado</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                

                                        if (  isset($_POST['operacion'])    and    $_POST['operacion']=="clubdedescuentos" OR    $_GET['operacion_actualizar_estado']=1) {
                                            include_once("../controller/EmpresaController.php");
                                            $EmpresaController=new EmpresaController();
                                            $resultadoEmpresa=$EmpresaController->listarEmpresasDelClubbDeDescuentos();
                                            while ($muestra= mysqli_fetch_array($resultadoEmpresa)) {
                                           
                                    ?>
                                                        <tbody>
                                                            <tr>
                                                                <?php
                                        ?>
                                                                    <td class="mdl-data-table__cell--non-numeric">
                                                                        <span style="font-size:20px;">
                                          <?php echo $muestra['nombre_fantasia'];?>
                                          </span>
                                                                    </td>
                                                                    <td class="mdl-data-table__cell--non-numeric">
                                                                        <?php echo $muestra['numero_socio'];?>
                                                                    </td>
                                                                    <td class="mdl-data-table__cell--non-numeric">
                                                                        <?php echo $muestra['telefono'];?>
                                                                    </td>
                                                                    <td>
                                                                    <form action="../controller/EmpresaController.php" method="post">
                                                                        <input type="hidden" name="operacion" value="actualizar_estado">
                                                                        <input type="hidden" name="id_empresa" value="<?php echo  $muestra['id_empresa'];?>">
                                                                        <input type="hidden" name="visible" value="<?php echo $muestra['visible'];?>">
                                                                       
                                                                            <!-- Colored raised button -->
                                                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
                                                                            <?php if($muestra['visible']==1){?>

                                                                                Desabilitar
                                                                                <?php }else {?>
                                                                                habilitar
                                                                                    <?php } ?>
                                                                            </button>

                                                                      
                                                                    </form>


                                                                    </td>
                                                                    <?php
                                          }
                                          }
                                          ?>
                                                            </tr>
                                                        </tbody>
                                                        <?php
                                    
                                    
                                    

                                
                                    ?>
                                            </table>
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