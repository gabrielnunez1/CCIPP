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

  <link rel="shortcut icon" href="images/favicon.png">

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
        <div class="demo-charts  mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" style="background-color: #01aba8;">


          <div class="mdl-card__supporting-text mdl-color-text--blue-grey-90">

             <?php
              include_once("../controller/EstadisticasController.php");
              $EstadisticasController=new EstadisticasController();
         
         
              $resultado=$EstadisticasController->ArticulosTotalesEmpresas($_SESSION['id_empresa']); 
              while ($muestra = mysqli_fetch_array($resultado)) {?>
              <h3>Total de Articulos: <?php echo  $muestra['ArticulosTotales'];?></h3> <?php }?>
              
              <?php  $resultado=$EstadisticasController->ArticulosInhabilitadosEmpresas($_SESSION['id_empresa']); 
              while ($muestra = mysqli_fetch_array($resultado)) {?>
              <h3>Articulos inhabilitados: <?php echo  $muestra['ArticulosInhabilitados'];?></h3> <?php }?>
             
             <?php  $resultado=$EstadisticasController->ArticulosHabilitadosEmpresas($_SESSION['id_empresa']); 
              while ($muestra = mysqli_fetch_array($resultado)) {?>
              <h3>Articulos habilitados: <?php echo  $muestra['ArticulosHabilitados'];?></h3> <?php }?>
             
          </div>


        </div>
        </div>
      </div>
    </main>
  </div>
  <script src="../material.js"></script>
</body>

</html>