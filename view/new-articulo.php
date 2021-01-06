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
            <?php 
         include_once("../controller/EventoController.php");
         $EventoController=new EventoController();
         $resultado = $EventoController->listar();
         $contador=0;
         while ($muestra = mysqli_fetch_array($resultado)) {
           #si el evento esta avilitado
      

           if ($contador==0){

             if ($muestra['visible']==1 )
               {
                 $contador=1;
                 $evento_en_estemomento=$muestra['id_evento'];
                 ?>

                <!--EVENTO-->
                <div class="android-more-section">
                    <div class="android-card-container mdl-grid">
                        <!-- Wide card with share menu button -->
                        <style>
                            .demo-card-wide.mdl-card {}
                            
                            .demo-card-wide > .mdl-card__title {
                                color: #fff;
                                height: 176px;
                                background: url("../img/<?php echo $muestra['logo'];?>") bottom right 15% no-repeat #46B6AC;
                            }
                            
                            .demo-card-wide > .mdl-card__menu {
                                color: #fff;
                            }
                        </style>

                        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--12-col">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text"><?php echo $muestra['nombre'];?></h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <?php echo $muestra['descripcion'];?>
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
                  }
                }
          }





      

          include_once("../controller/EmpresaController.php");
          $EmpresaController=new EmpresaController();



          if (isset($_GET['operacion']) and $_GET['operacion']=="listar") {
              $rubro=$_GET['rubro'];
            $resultadoEmpresa=$EmpresaController->listarProductosQueParticipanDelEventoYqueSonDeElRubro($evento_en_estemomento, $rubro);
        }else{
            $resultadoEmpresa=$EmpresaController->listarProductosQueParticipanDelEvento($evento_en_estemomento);
        }
         
          while ($muestraEmpresa = mysqli_fetch_array($resultadoEmpresa)) {
?>













                    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
                        <div class="mdl-card__media">
                        <img src="../img/<?php echo $muestraEmpresa['imagen'];?>">
                           
                        </div>
                        <div class="mdl-card__title">
                            <h4 class="mdl-card__title-text"> <?php echo $muestraEmpresa['nombre'];?></h4>
                        </div>
                        <div class="mdl-card__supporting-text">
                        
                    <div>
                      <span class="mdl-porcentaje"><?php
                                $porcentaje=floatval($muestraEmpresa['precio'])*(floatval($muestraEmpresa['cantidad_descuento'])/100);
                                $precio=floatval($muestraEmpresa['precio'])-$porcentaje;
                                ?>$<?php echo number_format($precio,2,",","."); ?>
                      </span>
                    </div>
                        <span class="mdl-cantidad_descuento"><?php echo $muestraEmpresa['cantidad_descuento'];?>% OFF</span>
                        <span class="mdl-precio">$<?php echo number_format($muestraEmpresa['precio'],2,",",".");?></span>
</div>                 
                        <div class="mdl-card__actions">
                            <a class="android-link mdl-button mdl-js-button mdl-typography--text-uppercase" href="descuentos.php?id_producto=<?php echo $muestraEmpresa['id_producto'];?>">
                           <?php
                           
                         
                                  echo $muestraEmpresa['nombre_fantasia'];

                              ?>
                            <i class="material-icons">chevron_right</i><?php echo $muestraEmpresa['nombre'];?></a>
                        </div>
                      </div>













<?php

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