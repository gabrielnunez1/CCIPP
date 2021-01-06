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
  <link rel="stylesheet" href="../getmdl-select.min.css">
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

<body onload="mostrar()">
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
            <h3>Gestión de articulo</h3>
            <h5>Dede aqui podras editar los datos del articulo, Recuerda completar todos los datos necesarios.</h5>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                <a href="#editar-empresa" class="mdl-tabs__tab is-active">Editar articulo</a>
                
              </div>
              <div class="mdl-tabs__panel is-active" id="editar-empresa">
                <!-- Textfield with Floating Label -->
             
                <?php
                              include_once("../controller/ProductoController.php");
                              $ProductoController=new ProductoController();
                              $result=$ProductoController->listarProducto($_POST['id_producto']);
                             
                              if(isset($result)){
                               $ProductoModel = mysqli_fetch_array($result) ; 
                               ?>       
              
                  <form action="../controller/ProductoController.php" method="post" enctype='multipart/form-data'>
                    <!--Nombre-->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="nombre" value="<?php echo $ProductoModel['nombre'];?>" name="nombre" required="">
                      <label class="mdl-textfield__label" for="nombre">Nombre</label>
                    </div>
                    </br>
                  <!--Descripción-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                      <input class="mdl-textfield__input" type="text" id="descripcion" value="<?php echo $ProductoModel['descripcion'];?>" name="descripcion" required="">
                      <label class="mdl-textfield__label" for="descripcion">Descripción</label>
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
                      <!--DESCUENTO -->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                  <input type="text" value="<?php echo $ProductoModel['cantidad_descuento'];?>" class="mdl-textfield__input" id="cantidad_descuento" readonly onchange="porcentaje();">
                        <input type="hidden" value="<?php echo $ProductoModel['cantidad_descuento'];?>" name="cantidad_descuento">
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
                    <input class="mdl-textfield__input" required="" type="number" value="<?php echo $ProductoModel['precio'];?>"  name="precio" id="precio" onkeyUp="porcentaje();">
                    <label class="mdl-textfield__label" for="precio">Precio</label>
                    <span class="mdl-textfield__error">¡La entrada no es un número entero o esta incompleta!</span>
                  </div>
                  <br>
                  <p>Precio de publicación será: $ <span id="total" style="color:#39b54a;font-size: 25px"></span></p>
                  
                  <?php
                                include_once("../controller/RubroController.php");
                                $RubroController=new RubroController();
                                $resultado=$RubroController->listar();
                                if (isset($resultado)) {
                                    ?>
                  <!--RUBRO -->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                    <input type="text" value="<?php echo $ProductoModel['rubro'];?>" required="" class="mdl-textfield__input" id="rubro" readonly>
                    <input type="hidden" value="<?php echo $ProductoModel['rubro'];?>" required="" name="rubro">
                    <label for="rubro" value="" class="mdl-textfield__label">Rubro</label>
                    <ul for="sample1" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <?php 
                                  while ($muestra = mysqli_fetch_array($resultado)) {
                                      ?>
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
                <script>
                    function mostrar(){
                if (document.getElementById('TEXT_ID_1').value == "") {
                    document.getElementById('imagen-1').required = true;
                }else {
                  document.getElementById('imagen-1').required = false;
                  }
                }
                </script>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file mdl-textfield--floating-label  has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input"  value="<?php echo $ProductoModel['imagen'];?>"  name="TEXT_ID_1" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_1" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-1" value="<?php echo $ProductoModel['imagen'];?>" id="imagen-1" onchange="document.getElementById('TEXT_ID_1').value=this.files[0].name;"
                      />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file mdl-textfield--floating-label  has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input"  value="<?php echo $ProductoModel['imagen2'];?>" name="TEXT_ID_2" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_2" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-2" id="imagen-2"  onchange="document.getElementById('TEXT_ID_2').value=this.files[0].name;"
                      />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input"  value="<?php echo $ProductoModel['imagen3'];?>" name="TEXT_ID_3" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_3" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-3" id="imagen-3" onchange="document.getElementById('TEXT_ID_3').value=this.files[0].name;" />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input"  value="<?php echo $ProductoModel['imagen4'];?>" name="TEXT_ID_4" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_4" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-4" id="imagen-4" onchange="document.getElementById('TEXT_ID_4').value=this.files[0].name;" />
                    </div>
                  </div>
                  </br>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                    <input class="mdl-textfield__input"  value="<?php echo $ProductoModel['imagen5'];?>" name="TEXT_ID_5" placeholder="Selecciona un archivo" type="text" id="TEXT_ID_5" readonly />
                    <div class="mdl-button mdl-button--icon mdl-button--file">
                      <i class="material-icons">attach_file</i>
                      <input type="file" name="imagen-5" id="imagen-5" onchange="document.getElementById('TEXT_ID_5').value=this.files[0].name;" />
                    </div>
                  </div>
                  <br>
                    <br>
                    <input class="mdl-button" type="hidden"  name="id_producto" value="<?php echo $ProductoModel['id_producto'];?>">
                    <input class="mdl-button" type="hidden" name="operacion" value="editar">
                    <input type="hidden" value="<?php echo $_SESSION['id_empresa'];?>" required="" name="usuario">
                    <input class="mdl-button" type="submit" name="editar" value="Guardar cambios">

                  </form>

                <?php
                              }
                              ?>


              </div>
              <div class="mdl-tabs__panel" id="administrar-empresa">
                <div class="mdl-card__title mdl-card--expand">
                  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                      <tr>
                        <th class="mdl-data-table__cell--non-numeric">Nombre de articulo</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                      </tr>
                    </thead>
                    <?php
                                    include_once("../controller/ProductoController.php");
                                    $ProductoController=new ProductoController();
                                    $resultado=$ProductoController->listar();
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
                          <form action="../controller/ProductoController.php" method="post">
                            <input type="hidden" name="operacion" value="eliminar">
                            <input type="hidden" name="id_producto" value="<?php echo  $muestra['id_producto'];?>">
                            <button class="mdl-button mdl-js-button mdl-button--icon">
                              <div id="eliminar<?php echo  $muestra['id_producto'];?>" class="icon material-icons">delete</div>
                              <div class="mdl-tooltip mdl-tooltip--large" for="eliminar<?php echo  $muestra['id_producto'];?>">eliminar</div>
                            </button>
                          </form>
                        </td>
                        <td>

                          <!-- Simple Textfield -->
                          <form action="../controller/ProductoController.php" method="post">
                            <div class="mdl-textfield mdl-js-textfield">  
                              <a href="descuentos.php?id_producto=<?php echo $muestra['id_producto'];?>">
                              <label class="mdl-textfield__label" for="descuentos.php?id_producto=<?php echo $muestra['id_producto'];?>">edit</label>
                            </div>
                          </form>
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
  <script src="../getmdl-select.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</body>

</html>
