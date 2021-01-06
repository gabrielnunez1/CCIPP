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

</html>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <?php include_once("parts/new-navigation.php"); ?>
        <div class="android-content mdl-layout__content">
            <a name="top"></a>

            <!--EVENTO-->
            <div class="android-more-section">
                <div class="android-card-container mdl-grid">

                    <!-- Wide card with share menu button -->
                    <style>
                        .demo-card-wide.mdl-card {}
                        
                        .demo-card-wide > .mdl-card__title {
                            color: #fff;
                            height: 176px;
                            background: url("../imagenes/static/cdd.png") bottom right 15% no-repeat #46B6AC;
                        }
                        
                        .demo-card-wide > .mdl-card__menu {
                            color: #fff;
                        }
                        .mdl-card__media{
                            min-height: 299px;
                            max-height: 300px;
                        }
                    </style>

                    <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Club de descuentos</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            descripcion club de descuento
                        </div>
                    </div>
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

                //si el producto esta visible, consultar si el comerciante puede publicar el producto
                include_once("../controller/EmpresaController.php");
                $EmpresaController=new EmpresaController();
                $resultadoEmpresa=$EmpresaController->listar();
                while ($muestraEmpresa = mysqli_fetch_array($resultadoEmpresa)) {
                  if ($muestraEmpresa['visible']==1 ) {
                    ?>
                        <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                            <div class="mdl-card__media">
                                <img src="../img/<?php echo $muestraEmpresa['logo'];?>">

                            </div>
                            <div class="mdl-card__title">
                                <h4 class="mdl-card__title-text"><?php echo $muestraEmpresa['nombre_fantasia'];?></h4>
                            </div>
                            <div class="mdl-card__supporting-text">

                                <div>
                                <?php echo $muestraEmpresa['correo'];?><br>
                                <?php echo $muestraEmpresa['telefono'];?><br>
                                <?php echo $muestraEmpresa['direccion'];?>
                                </div>

                                <div class="mdl-card__actions">

                                </div>
                            </div>

                        </div>

                        <?php
                  }
                }

?>
                </div>
            </div>
            <?php include_once("parts/footer.php");?>
        </div>
</div>
<!--
   <a href="cargar/index.php" target="_blank" id="view-source" class="mdl-button mdl-js-button  mdl-button--fab mdl-button--colored mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast"><i class="material-icons">add</i></a>-->
<script src="res/material.js"></script>
</body>

</html>