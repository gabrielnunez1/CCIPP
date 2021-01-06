<!doctype html>
<html lang="es-la">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Cámara de Comercio e Industria de Posadas</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../material.css">
    <link rel="stylesheet" href="../styles-mdl-tudexgames.css">
    <script src="../material.js"></script>
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
<style>
html{
    overflow:hidden;
}
</style>
</html>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php include_once("parts/new-navigation.php");?>
        <div class="android-content mdl-layout__content">
            <a name="top"></a>
            <div class="android-more-section">
                <div class="android-card-container mdl-grid">
                    <div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--8-col-phone mdl-card mdl-shadow--3dp">
                        <div class="mdl-card__media">
                            <style>
                                .mdl-precio {
                                    color: #999;
                                    display: block;
                                    overflow: hidden;
                                    line-height: 1;
                                    padding-left: 20px;
                                    position: relative;
                                    font-size: 16px;
                                    text-decoration: line-through;
                                }
                                
                                .mdl-porcentaje {
                                    overflow: visible;
                                    display: inline-block;
                                    vertical-align: text-bottom;
                                    line-height: 1em;
                                    font-size: 44px;
                                    font-weight: 300;
                                    font-family: Proxima Nova, -apple-system, Helvetica Neue, Helvetica, Roboto, Arial, sans-serif;
                                }
                                
                                .mdl-cantidad_descuento {
                                    float: left;
                                    color: #39b54a;
                                }
                            </style>

                                        <?php
                                          include_once("../controller/ProductoController.php");
                                          $ProductoController=new ProductoController();
                                          if (isset($_GET['id_producto'])) {
                                            $resultado = $ProductoController->listarProducto($_GET['id_producto']);
                                                      }
                                                      while ($muestra = mysqli_fetch_array($resultado)) {
                                                        if ($muestra['visible']==1 )
                                                        {

                                          ?>

                                <link rel="shortcut icon" href="../favicon.ico">
                                <link rel="stylesheet" type="text/css" href="css/style.css" />
                                <script src="js/modernizr.custom.63321.js"></script>
                                </head>

                                <body>
                                    <?php include_once("../view/rotador_imagenes.php");     ?>
                        </div>

                        <div class="mdl-card__supporting-text">
                            <div>
                                <span class="mdl-porcentaje"><?php
                                $porcentaje=floatval($muestra['precio'])*(floatval($muestra['cantidad_descuento'])/100);
                                $precio=floatval($muestra['precio'])-$porcentaje;
                                ?>$<?php echo number_format($precio,2,",","."); ?></span>
                            </div>
                            <span class="mdl-cantidad_descuento"><?php echo $muestra['cantidad_descuento'];?>% OFF</span>
                            <span class="mdl-precio">$<?php echo number_format($muestra['precio'],2,",",".");?></span>

                        </div>
                        <div class="mdl-card__actions">
                        </div>
                    </div>

                              <?php

                              $usuario=$muestra['usuario'];

                              }}
                              ?>

                                  <?php
                                  include_once("../controller/EmpresaController.php");
                                  $EmpresaController=new EmpresaController();
                                  $resultado=$EmpresaController->listarLaEmpresaDeEstaSesion($usuario);
                                  if(isset($resultado)){
                                  while ($muestra = mysqli_fetch_array($resultado)) {
                              ?>
                            <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                                <div class="mdl-card__media">
                                    <img src="../img/<?php echo $muestra['logo'];?>">
                                </div>
                                <div class="mdl-card__title">
                                    <h4 class="mdl-card__title-text"><?php echo $muestra['nombre_fantasia'];?></h4>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div>
                                        Telefono:
                                        <?php echo $muestra['telefono'];?>
                                            <br> Celular:
                                            <?php echo $muestra['celular'];?>
                                                <br> Email:
                                                <?php echo $muestra['correo'];?>
                                                    <br> Dirección:
                                                    <?php echo $muestra['direccion'];?>
                                    </div>
                                </div>
                            </div>
                            <tbody>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <span style="font-size:20px;">

                            </span>
                                        <br>

                                    </td>

                                    <?php }}
                                              ?>

                </div>
            </div>

            <?php include_once("parts/footer.php");     ?>

        </div>
        <!--
   <a href="cargar/index.php" target="_blank" id="view-source" class="mdl-button mdl-js-button  mdl-button--fab mdl-button--colored mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast"><i class="material-icons">add</i></a>-->
        <script src="res/material.js"></script>

        </body>

        </html>