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
        <div class="demo-graphs mdl-shadow--2dp mdl-color--white mdl-cell mdl-cell--8-col">
          <div class="mdl-card__supporting-text mdl-color-text--blue-grey-90">
            <h3>Gestión de rubros</h3>
            <h5>Desde aquí podrás habilitar o deshabilitar los comercios del catalogo.</h5>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                <a href="#crear-rubro" class="mdl-tabs__tab is-active">Crear rubro</a>
                <a href="#administrar-rubro" class="mdl-tabs__tab">Administrar</a>
              </div>
              <div class="mdl-tabs__panel is-active" id="crear-rubro">

                <!-- Textfield with Floating Label -->

                <form action="../controller/RubroController.php" method="post">
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="descripcion" id="rubro_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="rubro_imput">Nombre del nuevo rubro</label>


                  </div>
                  <input class="mdl-button" type="submit" value="Crear Rubro">
                </form>








              </div>
              <div class="mdl-tabs__panel" id="administrar-rubro">
                <div class="mdl-card__title mdl-card--expand">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Descripcion</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <?php
                                    include_once("../controller/RubroController.php");
                                    $RubroController=new RubroController();
                                    $resultado=$RubroController->listar();
                                    if(isset($resultado)){
                                    
                                      while ($muestra = mysqli_fetch_array($resultado)) {
                                        ?>
                    <tbody>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['descripcion'];?>
                        </td>
                        </td>
                        <td>
                          <form action="../controller/RubroController.php" method="post">
                            <input type="hidden" name="operacion" value="eliminar">
                            <input type="hidden" name="id_rubro" value="<?php echo  $muestra['id_rubro'];?>">
                            <button class="mdl-button mdl-js-button mdl-button--icon">
                              <div id="eliminar<?php echo  $muestra['id_rubro'];?>" class="icon material-icons">delete</div>
                              <div class="mdl-tooltip mdl-tooltip--large" for="eliminar<?php echo  $muestra['id_rubro'];?>">eliminar</div>
                            </button>
                          </form>
                        </td>
                        <td>

                          <!-- Simple Textfield -->
                          <form action="../controller/RubroController.php" method="post">
                            <div class="mdl-textfield mdl-js-textfield">
                              <input type="hidden" name="operacion" value="editar">
                              <input type="hidden" name="id_rubro" value="<?php echo  $muestra['id_rubro'];?>">
                              <input class="mdl-textfield__input" type="text" name="descripcion" id="editar<?php echo  $muestra['id_rubro'];?>">
                              <label class="mdl-textfield__label" for="editar<?php echo  $muestra['id_rubro'];?>">Editar Rubro</label>
                            </div>
                          </form>

                          <!--<form action="../controller/RubroController.php" method="post">
                                             <input type="hidden" name="operacion" value="editar">
                                             <input type="hidden" name="id_rubro" value="<?php echo  $muestra['id_rubro'];?>">
                                            
                                             <input class="mdl-textfield__input" type="text"  name="descripcion"  id="rubro_imput_edit" required=""/>
                                             <label class="mdl-textfield__label" for="rubro_imput_edit"> </label>
                                             <button class="mdl-button mdl-js-button mdl-button--icon">
                                                <div id="editar<?php echo  $muestra['id_rubro'];?>" class="icon material-icons">edit</div>
                                                <div class="mdl-tooltip mdl-tooltip--large" for="editar<?php echo  $muestra['id_rubro'];?>">editar</div>
                                             </button>
                                          </form>-->


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
        </div>
        





 <?php include_once("parts/preguntas_frecuentes.php"); ?> 


        </div>
      </div>
    </main>
  </div>
  
  <script src="../material.js"></script>
</body>

</html>