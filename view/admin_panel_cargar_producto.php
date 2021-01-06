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
            <h3>Gestión de Articulo</h3>
            <h5>Desde aquí podras agregar, quitar, habilitar o deshabilitar los articulos del catalogo.</h5>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                <a href="#crear-producto" class="mdl-tabs__tab is-active">Agregar articulo</a>
                <a href="#administrar-producto" class="mdl-tabs__tab">Administrar</a>
              </div>
              <div class="mdl-tabs__panel is-active" id="crear-producto">
                <!--FORMULARIO CREAR PRODUCTO-->
                <!-- NOMBRE -->
                <form action="../controller/ProductoController.php" method="post" enctype='multipart/form-data'>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="nombre" id="producto_imput" required="" />
                    <input type="hidden" name="operacion" value="crear">
                    <label class="mdl-textfield__label" for="producto_imput">Nombre</label>
                  </div>
                  <br>
                  <!-- DESCRIPCION -->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" required="" type="text" name="descripcion" id="producto_imput" required="" />
                    <label class="mdl-textfield__label" name="precio" for="descripcion">Descripción</label>
                  </div>
                  <br>
                  <!--DESCUENTO -->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                    <input type="text" value="" required="" class="mdl-textfield__input" id="cantidad_descuento" readonly onchange="porcentaje();">
                    <input type="hidden" value="" required="" name="cantidad_descuento">
                    <label for="cantidad_descuento" value="" class="mdl-textfield__label">Porcentaje</label>
                    <ul for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <li class="mdl-menu__item" data-val="5">5%</li>
                      <li class="mdl-menu__item" data-val="10">10%</li>
                      <li class="mdl-menu__item" data-val="15">15%</li>
                      <li class="mdl-menu__item" data-val="20">20%</li>
                      <li class="mdl-menu__item" data-val="25">25%</li>
                      <li class="mdl-menu__item" data-val="30">30%</li>
                      <li class="mdl-menu__item" data-val="35">35%</li>
                      <li class="mdl-menu__item" data-val="40">40%</li>
                      <li class="mdl-menu__item" data-val="45">45%</li>
                      <li class="mdl-menu__item" data-val="50">50%</li>
                      <li class="mdl-menu__item" data-val="55">55%</li>
                      <li class="mdl-menu__item" data-val="60">60%</li>
                      <li class="mdl-menu__item" data-val="65">65%</li>
                      <li class="mdl-menu__item" data-val="70">70%</li>
                      <li class="mdl-menu__item" data-val="75">75%</li>
                    </ul>
                  </div>
                  <br>
                  <!-- PRECIO NORMAL -->



                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" required="" type="number" name="precio" id="precio" onkeyUp="porcentaje();">
                    <label class="mdl-textfield__label" for="precio">Precio</label>
                    <span class="mdl-textfield__error">¡La entrada no es un número entero o esta incompleta!</span>
                  </div>
                  <br>


                  <script type="text/javascript">
                    function porcentaje(cantidad_descuento, precio) {
                      var cantidad_descuento = parseInt(document.getElementById("cantidad_descuento").value);
                      var precio = parseInt(document.getElementById("precio").value);
                      var total = document.getElementById('total');

                      porcentaje.innerHTML = cantidad_descuento * precio / 100;
                      total.innerHTML = precio - porcentaje.innerHTML;

                    }

                  </script>

                  <p>Precio de publicación será: $
                    <span id="total" style="color:#39b54a;font-size: 25px"></span>
                  </p>


                  <?php
                                include_once("../controller/RubroController.php");
                                $RubroController=new RubroController();
                                $resultado=$RubroController->listar();
                                if (isset($resultado)) {
                                    ?>
                  <!--RUBRO -->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                    <input type="text" value="" required="" class="mdl-textfield__input" id="rubro" readonly>
                    <input type="hidden" value="" required="" name="rubro">
                    <label for="rubro" value="" class="mdl-textfield__label">Rubro</label>
                    <ul for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">


                      <?php 
                                  while ($muestra = mysqli_fetch_array($resultado)) {
                                      ?>

<!-- CAmbie por descripcion por que te guarda el id de rubro en producto -->

                     <li class="mdl-menu__item" data-val="<?php echo $muestra['descripcion']; ?>">
                        <?php echo $muestra['descripcion']; ?>
                      </li>
                      <?php
                                  };
                                }
                            ?>

                    </ul>
                  </div>
                  <br>
                  <br>
                  <span class="mdl-switch__label">¿Desea que este producto este visible en el catalogo?</span>
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



                  <script>document.getElementById("uploadBtn").onchange = function () {
                      document.getElementById("uploadFile").value = this.files[0].name;
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
                      <input type="file" name="imagen-1" id="ID" required="" onchange="document.getElementById('TEXT_ID_1').value=this.files[0].name;"
                      />
                    </div>
                  </div>


                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file mdl-textfield--floating-label  has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_2" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-2" id="ID" required="" onchange="document.getElementById('TEXT_ID_2').value=this.files[0].name;"
                      />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_3" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-3" id="ID" onchange="document.getElementById('TEXT_ID_3').value=this.files[0].name;" />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_4" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-4" id="ID" onchange="document.getElementById('TEXT_ID_4').value=this.files[0].name;" />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_5" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-5" id="ID" onchange="document.getElementById('TEXT_ID_5').value=this.files[0].name;" />
                    </div>
                  </div>
                  <br>




                  <input type="hidden" value="<?php echo $_SESSION['id_empresa'];?>" required="" name="usuario">
                  <input class="mdl-button" type="hidden" name="operacion" name="save" value="crear">
                  <input class="mdl-button" type="submit" name="save" value="Cargar articulo">
                </form>
              </div>
              <!--fin del primero	 -->
              <div class="mdl-tabs__panel" id="administrar-producto">
                <div class="mdl-card__title mdl-card--expand">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Hacer visible</th>
                      </tr>
                    </thead>
                    <?php
                                    include_once("../controller/ProductoController.php");
                                    $ProductoController=new ProductoController();
                                    $resultado=$ProductoController->listarLosProductosDeEstaSesion($_SESSION['id_empresa']);
                                    if (isset($resultado)) {
                                        while ($muestra = mysqli_fetch_array($resultado)) {
                                            ?>

                    <tbody>
                      <tr>
                        <td class="mdl-data-table__cell--non-numeric">
                          <?php echo $muestra['nombre']; ?>
                        </td>
                        <td class="mdl-data-table__cell--non-numeric">
                          <form action="../view/admin_panel_editar_producto.php" method="post">
                            <button class="mdl-button mdl-js-button mdl-button--icon">
                              <div id="id_producto=<?php echo $muestra['id_producto']; ?>" class="icon material-icons">edit</div>
                              <div class="mdl-tooltip mdl-tooltip--large" for="id_producto=<?php echo $muestra['id_producto']; ?>">editar</div>
                              <input type="hidden" name="id_producto" value="<?php echo $muestra['id_producto']; ?>">
                            </button>
                          </form>
                        </td>

                        <td class="mdl-data-table__cell--non-numeric">
                          <form action="../controller/ProductoController.php" method="post">
                            <input type="hidden" name="operacion" value="eliminar">
                            <input type="hidden" name="id_producto" value="<?php echo  $muestra['id_producto']; ?>">
                            <button class="mdl-button mdl-js-button mdl-button--icon">
                              <div id="eliminar<?php echo  $muestra['id_producto']; ?>" class="icon material-icons">delete</div>
                              <div class="mdl-tooltip mdl-tooltip--large" for="eliminar<?php echo  $muestra['id_producto']; ?>">eliminar</div>
                            </button>
                          </form>
                        </td>

                        <td>
                          <script>
                            function visible(val) {
                              $.ajax(
                                {
                                  type: "POST",
                                  url: "../controller/ProductoController.php",
                                  data: 'visible=' + val,
                                }
                              );
                            }
                          </script>




                          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch<?php echo  $muestra['id_producto']; ?>">
                            <?php if ($muestra['visible']==1) {
                                                ?>
                            <input type="checkbox" id="switch<?php echo  $muestra['id_producto']; ?>" class="mdl-switch__input" onchange="visible(<?php echo  $muestra['id_producto']; ?>);"
                              checked>
                            <?php
                                            } else {
                                                ?>
                            <input type="checkbox" id="switch<?php echo  $muestra['id_producto']; ?>" class="mdl-switch__input" onchange="visible(<?php echo  $muestra['id_producto']; ?>);">
                            <?php
                                            } ?>
                            <span class="mdl-switch__label"></span>
                          </label>
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