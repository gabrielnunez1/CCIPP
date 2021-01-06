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
            <h3>Gestión de evento</h3>
            <h5>Desde aquí podras habilitar o deshabilitar los eventos del catalogo.</h5>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                <a href="#crear-evento" class="mdl-tabs__tab is-active">Crear evento</a>
                <a href="#administrar-evento" class="mdl-tabs__tab">Administrar</a>
              </div>
              <div class="mdl-tabs__panel is-active" id="crear-evento">

                <!-- Textfield with Floating Label -->


                <form action="../controller/EventoController.php" method="post" enctype='multipart/form-data'>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="nombre" id="evento_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="evento_imput">Nombre del nuevo evento</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="descripcion" id="evento_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="evento_imput">Descripción</label>
                  </div>
                  <br>


                  <script>document.getElementById("uploadBtn").onchange = function () {
                      document.getElementById("uploadFile").value = this.files[0].name;
                    }
                                 };

                  </script>
                  <!-- Imagenes -->
                  <style>
                    .mdl-button--file input {
                      cursor: pointer;
                      height: 100%;
                      right: 0;
                      opacity: 0;
                      position: absolute;
                      top: 0;
                      width: 300px;
                      z-index: 4;
                    }

                    .mdl-textfield--file .mdl-textfield__input {
                      box-sizing: border-box;
                      width: calc(100% - 32px);
                    }

                    .mdl-textfield--file .mdl-button--file {
                      right: 0;
                    }
                  </style>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file mdl-textfield--floating-label  has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_1" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="logo" id="ID" required="" onchange="document.getElementById('TEXT_ID_1').value=this.files[0].name;"
                      />

                    </div>
                  </div>
                  <br>


                  <br>
                  <br>


                  <span class="mdl-switch__label">¿Desea que este evento este disponible de inmediato?</span>
                  <br>
                  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                    <input type="radio" id="option-1" class="mdl-radio__button" name="visible" value="1" checked>
                    <span class="mdl-radio__label">Si</span>
                  </label>

                  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                    <input type="radio" id="option-2" class="mdl-radio__button" name="visible" value="0">
                    <span class="mdl-radio__label">No</span>
                  </label>


                  <br>
                  <input class="mdl-button" type="submit" value="Crear Evento">
                </form>








              </div>
              <div class="mdl-tabs__panel" id="administrar-evento">
                <div class="mdl-card__title mdl-card--expand">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Nombre Evento</th>
                        <th class="mdl-data-table__cell--non-numeric">Visible</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <?php
                                    include_once("../controller/EventoController.php");
                                    $EventoController=new EventoController();
                                    $resultado=$EventoController->listar();
                                    if(isset($resultado)){
                                    
                                      while ($muestra = mysqli_fetch_array($resultado)) {
                                        ?>
                    <tbody>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['nombre'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                            <script>
                              function visible(val) {
                                $.ajax(
                                  {
                                    type: "POST",
                                    url: "../controller/EventoController.php",
                                    data: 'visible=' + val,
                                  }
                                );
                              }
                            </script>


                            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch<?php echo  $muestra['id_evento'];?>">
                              <?php if($muestra['visible']==1){?>
                              <input type="checkbox" id="switch<?php echo  $muestra['id_evento'];?>" class="mdl-switch__input" onchange="visible(<?php echo  $muestra['id_evento'];?>);"
                                checked>
                              <?php }else {?>
                              <input type="checkbox" id="switch<?php echo  $muestra['id_evento'];?>" class="mdl-switch__input" onchange="visible(<?php echo  $muestra['id_evento'];?>);">
                              <?php } ?>
                              <span class="mdl-switch__label"></span>
                            </label>
                          </td>


                        <td>
                          <form action="../controller/EventoController.php" method="post">
                            <input type="hidden" name="operacion" value="eliminar">
                            <input type="hidden" name="id_evento" value="<?php echo  $muestra['id_evento'];?>">
                            <button class="mdl-button mdl-js-button mdl-button--icon">
                              <div id="eliminar<?php echo  $muestra['id_evento'];?>" class="icon material-icons">delete</div>
                              <div class="mdl-tooltip mdl-tooltip--large" for="eliminar<?php echo  $muestra['id_evento'];?>">eliminar</div>
                            </button>
                          </form>
                        </td>
                        <td>


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
    </main>
  </div>

  <script src="../material.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</body>

</html>