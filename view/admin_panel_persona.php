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
            <h3>Gestión de usuario</h3>
            <h5>Desde aqui podras habilitar o deshabilitar los usuarios del catalogo</h5>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                <a href="#crear-persona" class="mdl-tabs__tab is-active">Crear usuario</a>
                <a href="#administrar-persona" class="mdl-tabs__tab">Administrar</a>
              </div>
              <div class="mdl-tabs__panel is-active" id="crear-persona">

                <!-- Textfield with Floating Label -->
                <form action="../controller/PersonaController.php" method="post">
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" name="dni" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Dni</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="Nombre" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Nombre</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input" type="text" name="Apellido" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Apellido</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input" type="date" name="fecha" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Fecha nacimiento</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="direccion" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Dirección</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" name="telefono" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Teléfono</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="cuil" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Cuil</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="persona_usuario" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Usuario</label>
                  </div>
                  <br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" name="persona_password" id="persona_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="persona_imput">Contraseña</label>
                  </div>
                  <br>

                  <input class="mdl-button" type="submit">
                </form>

              </div>
              <div class="mdl-tabs__panel" id="administrar-persona">
                <div class="mdl-card__title mdl-card--expand">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Dni</th>
                        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                        <th class="mdl-data-table__cell--non-numeric">Apellido</th>
                        <th class="mdl-data-table__cell--non-numeric">Fecha nacimiento</th>
                        <th class="mdl-data-table__cell--non-numeric">Dirección</th>
                        <th class="mdl-data-table__cell--non-numeric">Teléfono</th>
                        <th class="mdl-data-table__cell--non-numeric">Cuil</th>
                        <th class="mdl-data-table__cell--non-numeric">Usuario</th>
                        <th class="mdl-data-table__cell--non-numeric">Contraseña</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <?php
                                    include_once("../controller/PersonaController.php");
                                    $PersonaController=new PersonaController();
                                    $resultado=$PersonaController->listar();
                                    if(isset($resultado)){
                                    
                                      while ($muestra = mysqli_fetch_array($resultado)) {
                                        ?>
                    <tbody>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['dni'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['nombre'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['apellido'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['fecha'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['direccion'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['telefono'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['correo'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['cuil'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['persona_usuario'];?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['persona_password'];?>
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
        <div class="demo-cards mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-grid mdl-grid--no-spacing">
          <div class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--12-col-desktop">
            <div class="mdl-card__title mdl-card--expand mdl-color--teal-300">
              <h2 class="mdl-card__title-text">Necesitas Ayuda</h2>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
              Desde aquí descarga los manuales para cada tipo de usuario..
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Administrador</a>
              <a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Comerciante</a>

            </div>
          </div>
          <div class="demo-separator mdl-cell--1-col"></div>
          <div class="demo-separator mdl-cell--1-col"></div>
            <div class="demo-options mdl-card mdl-color--deep-purple-500 mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--12-col-desktop">
              <?php include_once("parts/preguntas_frecuentes.php"); ?> 
            </div>
          </div>
          </div>
        </div>
      </div>
    </main>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
      <mask id="piemask" maskContentUnits="objectBoundingBox">
        <circle cx=0.5 cy=0.5 r=0.49 fill="white" />
        <circle cx=0.5 cy=0.5 r=0.40 fill="black" />
      </mask>
      <g id="piechart">
        <circle cx=0.5 cy=0.5 r=0.5 />
        <path d="M 0.5 0.5 0.5 0 A 0.5 0.5 0 0 1 0.95 0.28 z" stroke="none" fill="rgba(255, 255, 255, 0.75)" />
      </g>
    </defs>
  </svg>
  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 500 250" style="position: fixed; left: -1000px; height: -1000px;">
    <defs>
      <g id="chart">
        <g id="Gridlines">
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="27.3" x2="468.3" y2="27.3" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="66.7" x2="468.3" y2="66.7" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="105.3" x2="468.3" y2="105.3" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="144.7" x2="468.3" y2="144.7" />
          <line fill="#888888" stroke="#888888" stroke-miterlimit="10" x1="0" y1="184.3" x2="468.3" y2="184.3" />
        </g>
        <g id="Numbers">
          <text transform="matrix(1 0 0 1 485 29.3333)" fill="#888888" font-family="'Roboto'" font-size="9">500</text>
          <text transform="matrix(1 0 0 1 485 69)" fill="#888888" font-family="'Roboto'" font-size="9">400</text>
          <text transform="matrix(1 0 0 1 485 109.3333)" fill="#888888" font-family="'Roboto'" font-size="9">300</text>
          <text transform="matrix(1 0 0 1 485 149)" fill="#888888" font-family="'Roboto'" font-size="9">200</text>
          <text transform="matrix(1 0 0 1 485 188.3333)" fill="#888888" font-family="'Roboto'" font-size="9">100</text>
          <text transform="matrix(1 0 0 1 0 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">1</text>
          <text transform="matrix(1 0 0 1 78 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">2</text>
          <text transform="matrix(1 0 0 1 154.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">3</text>
          <text transform="matrix(1 0 0 1 232.1667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">4</text>
          <text transform="matrix(1 0 0 1 309 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">5</text>
          <text transform="matrix(1 0 0 1 386.6667 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">6</text>
          <text transform="matrix(1 0 0 1 464.3333 249.0003)" fill="#888888" font-family="'Roboto'" font-size="9">7</text>
        </g>
        <g id="Layer_5">
          <polygon opacity="0.36" stroke-miterlimit="10" points="0,223.3 48,138.5 154.7,169 211,88.5
                     294.5,80.5 380,165.2 437,75.5 469.5,223.3  " />
        </g>
        <g id="Layer_4">
          <polygon stroke-miterlimit="10" points="469.3,222.7 1,222.7 48.7,166.7 155.7,188.3 212,132.7
                     296.7,128 380.7,184.3 436.7,125  " />
        </g>
      </g>
    </defs>
  </svg>
  <script src="../material.js"></script>
</body>

</html>