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

<body onload="mostrar(); mostrarparticipa(); sample111(); sample121(); sample131(); sample141(); sample151();valida()">
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
            <h3>Gestión de comercio</h3>
            <h5>Desde aquí podrás editar los datos del comercio, Recuerda completar todos los datos necesarios.</h5>
          </div>
          <div class="mdl-card__actions mdl-card--border">
            <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
              <div class="mdl-tabs__tab-bar">
                <a href="#editar-empresa" class="mdl-tabs__tab is-active">Editar comerciante</a>

              </div>
              <div class="mdl-tabs__panel is-active" id="editar-empresa" >
                <!-- Textfield with Floating Label -->

                <?php
                  include_once("../controller/EmpresaController.php");
                  $EmpresaController=new EmpresaController();
                  $result=$EmpresaController->listarLaEmpresaDeEstaSesion($_SESSION["id_empresa"]);
                  if(isset($result)){
                   
                  $EmpresaModel = mysqli_fetch_array($result) ; 
                  // var_dump($EmpresaModel);exit;
                               ?>

                <form action="../controller/EmpresaController.php" method="post" enctype='multipart/form-data'>

                  <!--EMPRESA-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="nombre_fantasia" value="<?php echo $EmpresaModel['nombre_fantasia'];?>"
                      name="nombre_fantasia" required="">
                    <label class="mdl-textfield__label" for="nombre_fantasia">Nombre de Fantasía</label>
                  </div>
                  </br>
                  <!--USUARIO-->

                  <input type="hidden" class="mdl-textfield__input" type="text" id="usuario" value="<?php echo $EmpresaModel['usuario'];?>"
                    name="usuario" required="">

                  <!--CONTRASEÑA-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="password" id="password" value="<?php echo $EmpresaModel['password'];?>" name="password"
                      required="">
                    <label class="mdl-textfield__label" for="password">Contraseña</label>
                  </div>
                  <br>
                  <!--RAZON SOCIAL-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" value="<?php echo $EmpresaModel['razon_social'];?>" name="razon_social" id="razon_social"
                    required="" />
                    <label class="mdl-textfield__label" for="razon_social">Razón Social </label>
                  </div>
                  <br>
                  <!--CUIT-->

                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['cuit'];?>" name="cuit" id="cuit" required="" />
                    <label class="mdl-textfield__label" for="cuit">CUIT</label>
                    <span class="mdl-textfield__error">Ingrese solo números!</span>
                  </div>
                  <br>
                  <!--RUBRO-->

                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                    <input type="text" value="<?php echo $EmpresaModel['rubro'];?>" class="mdl-textfield__input" id="rubro" readonly>
                    <input type="hidden" value="<?php echo $EmpresaModel['rubro'];?>" name="rubro">
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                    <label for="rubro" class="mdl-textfield__label">Rubro</label>
                    <ul for="rubro" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <li class="mdl-menu__item" data-val="Autos, Motos y otros">Autos, Motos</li>
                      <li class="mdl-menu__item" data-val="Electricidad e Iluminacion">Electricidad e Iluminacion</li>
                      <li class="mdl-menu__item" data-val="Estilista y Estéticas">Estilista y Estéticas</li>
                      <li class="mdl-menu__item" data-val="Pintureria, Ferreteria">Pintureria, Ferreteria</li>
                      <li class="mdl-menu__item" data-val="Hoteles, Resto, Bares">Hoteles, Resto, Bares</li>
                      <li class="mdl-menu__item" data-val="Joyeria y relojeria">Joyeria y relojeria</li>
                      <li class="mdl-menu__item" data-val="Productos Regionales">Productos Regionales</li>
                      <li class="mdl-menu__item" data-val="Supermercado, vinoteca, cerveza">Supermercado, vinoteca, cerveza</li>
                      <li class="mdl-menu__item" data-val="Ópticas">Ópticas</li>
                      <li class="mdl-menu__item" data-val="Computacion y Telefonia celular">Computacion y Telefonia celular</li>
                      <li class="mdl-menu__item" data-val="Electrodomésticos y equipamientos">Electrodomésticos y equipamientos</li>
                      <li class="mdl-menu__item" data-val="Farmacia y perfumería">Farmacia y perfumería</li>
                      <li class="mdl-menu__item" data-val="Hogar, Muebles y Jardin">Hogar, Muebles y Jardin</li>
                      <li class="mdl-menu__item" data-val="Indumentaria, Calzados y Accesorios">Indumentaria, Calzados y Accesorios</li>
                      <li class="mdl-menu__item" data-val="Librería, papelería y regaleria">Librería, papelería y regaleria</li>
                      <li class="mdl-menu__item" data-val="Servicios">Servicios</li>
                      <li class="mdl-menu__item" data-val="Veterinarias">Veterinarias</li>
                      <li class="mdl-menu__item" data-val="Otros">Otros</li>
                    </ul>
                  </div>
                  <br>


                  <!--Responsable-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" value="<?php echo $EmpresaModel['responsable'];?>" name="responsable" id="responsable"
                    required=""/>
                    <label class="mdl-textfield__label" for="responsable">Responsable</label>
                  </div>
                  <br>

                  <!--Direccion-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" value="<?php echo $EmpresaModel['direccion'];?>" name="direccion" id="direccion"
                    required="" />
                    <label class="mdl-textfield__label" for="direccion">Dirección</label>
                  </div>
                  <br>
                  <!-- PROVINCIA -->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                    <input type="text" value="<?php echo $EmpresaModel['provincia'];?>" class="mdl-textfield__input" id="provincia" readonly>
                    <input type="hidden" value="<?php echo $EmpresaModel['provincia'];?>" name="provincia">
                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                    <label for="provincia" class="mdl-textfield__label">Provincia</label>
                    <ul for="provincia" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                      <li class="mdl-menu__item" data-val="Buenos Aires">Buenos Aires</li>
                      <li class="mdl-menu__item" data-val="Buenos Aires-GBA">Buenos Aires-GBA</li>
                      <li class="mdl-menu__item" data-val="Capital Federal">Capital Federal</li>
                      <li class="mdl-menu__item" data-val="Catamarca">Catamarca</li>
                      <li class="mdl-menu__item" data-val="Chaco">Chaco</li>
                      <li class="mdl-menu__item" data-val="Chubut">Chubut</li>
                      <li class="mdl-menu__item" data-val="Córdoba">Córdoba</li>
                      <li class="mdl-menu__item" data-val="Corrientes">Corrientes</li>
                      <li class="mdl-menu__item" data-val="Entre Ríos">Entre Ríos</li>
                      <li class="mdl-menu__item" data-val="Formosa">Formosa</li>
                      <li class="mdl-menu__item" data-val="Jujuy">Jujuy</li>
                      <li class="mdl-menu__item" data-val="La Pampa">La Pampa</li>
                      <li class="mdl-menu__item" data-val="La Rioja">La Rioja</li>
                      <li class="mdl-menu__item" data-val="Mendoza">Mendoza</li>
                      <li class="mdl-menu__item" data-val="Misiones">Misiones</li>
                      <li class="mdl-menu__item" data-val="Neuquén">Neuquén</li>
                      <li class="mdl-menu__item" data-val="Río Negro">Río Negro</li>
                      <li class="mdl-menu__item" data-val="Salta">Salta</li>
                      <li class="mdl-menu__item" data-val="San Juan">San Juan</li>
                      <li class="mdl-menu__item" data-val="San Luis">San Luis</li>
                      <li class="mdl-menu__item" data-val="Santa Cruz">Santa Cruz</li>
                      <li class="mdl-menu__item" data-val="Santa Fe">Santa Fe</li>
                      <li class="mdl-menu__item" data-val="Santiago del Estero">Santiago del Estero</li>
                      <li class="mdl-menu__item" data-val="Tierra del Fuego">Tierra del Fuego</li>
                      <li class="mdl-menu__item" data-val="Tucumún">Tucumún</li>
                    </ul>
                  </div>
                  <!--localidad-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" value="<?php echo $EmpresaModel['localidad'];?>" name="localidad" id="localidad"
                    required=""/>
                    <label class="mdl-textfield__label" for="">Localidad</label>

                  </div>
                  <!--TELEFONO FIJO-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['telefono'];?>" name="telefono" id="telefono"
                    required=""/>
                    <label class="mdl-textfield__label" for="telefono">Teléfono de Contacto (fijo) </label>
                    <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                  </div>
                  <!--TELEFONO CELULAR-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['celular'];?>" name="celular" id="celular"
                    required="" />
                    <label class="mdl-textfield__label" for="celular">Teléfono de Contacto (celular) </label>
                    <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                  </div>
                  <br>
                  <!--CORREO ELECTRONICO-->
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="email" value="<?php echo $EmpresaModel['correo'];?>" name="correo" id="correo" required="" />
                    <label class="mdl-textfield__label" for="correo">Correo electrónico </label>
                  </div>
                  <br>
                  <!--Logo-->
                  <script>document.getElementById("uploadBtn").onchange = function () {
                      document.getElementById("uploadFile").value = this.files[0].name;
                    }
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
                    <script>
                function mostrar(){
                if (document.getElementById('switch1').checked == true) {
                    document.getElementById('socio-m').style.display='block';
                    document.getElementById('sample10').required = true;
                }

                if (document.getElementById('switch1').checked == false) {
                  document.getElementById('socio-m').style.display='none';
                  document.getElementById("sample10").value="";
                  document.getElementById('sample10').required = false;
                  }
                }
                </script>
                <script>
                   function re(){
                 if (document.getElementById('TEXT_ID_1').value == "") {
                    document.getElementById('VPcropint').required = true;
                }else {
                  document.getElementById('VPcropint').required = false;
                  }
                }
                </script>
                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--file mdl-textfield--floating-label  has-placeholder is-invalid is-upgraded">
                    <input class="mdl-textfield__input" value="<?php echo $EmpresaModel['logo'];?>" placeholder="Selecciona un foto para el perfil"
                      type="text" name="TEXT_ID_1" id="TEXT_ID_1" readonly />
                     </div>
                  <div class='row'>
                    <div class='group'>
                      <div id='groupcrop'>
                        <div class='VPcrop'>
                           <input class='VPcropint' type="file" name="logo"   id="VPcropint" onchange="document.getElementById('TEXT_ID_1').value=this.files[0].name; previewFileimg('VPcropint')" />
                        </div>
                      </div>
                    </div>
                  </div>
                 
                  <br>
                  <br>
       <script>
          function previewFileimg(x){
                var file = document.getElementById(x).value = this.files[0].name;
                var reader  = new FileReader();
                reader.onloadend = function () {
                  VPcropremove = document.getElementById(x).parentNode;
                  groupcrop = VPcropremove.parentNode;
              //crea
              var t='t';
              VPcrimg = document.createElement('img');
              VPcrimg.className ='VPcimg';
              VPcrimg.src = "";
              VPcrimg.id ='VPcrimg'+t;
              VPcropremove.appendChild(VPcrimg);
              VPcrimg.src = reader.result;
              //

              VPcropremove.id = 'VPcropremove'+t;
              VPcropsw = document.createElement("input");
              VPcropsw.id= document.getElementById(x).id;
              VPcropsw.className = document.getElementById(x).className;
              VPcropsw.value = file.name;
              VPcropsw.name =document.getElementById(x).name;
              VPcropremove.appendChild(VPcropsw);
              //
              VPcropspan = document.createElement('span');
              VPcropspan.className ='VPcropspan';
              VPcropspan.id = "VPcropspan"+t;
              VPcropspan.innerHTML = 'x';
              VPcropspan.setAttribute('onclick',''+VPcropremove.id+'.remove()');
              VPcropremove.appendChild(VPcropspan);
              //
              VPcorpKt = document.createElement('div');
              VPcorpKt.className = 'VPcrop';
              VPcorpKt.id = 'VPcorpKt'+t;
              // esto hace que apareca otro contenedor de imagenes
             groupcrop.appendChild(VPcorpKt);
              //
              VPcropint = document.createElement('input');
              VPcropint.className ='VPcropint';
              VPcropint.name = '';
              VPcropint.type ='file';
              VPcropint.value='';
              VPcropint.id='VPcropint'+t;
              VPcropint.accept =document.getElementById(x).accept;
              
              VPcropint.setAttribute('onchange','previewFileimg("'+VPcropint.id+'")');
              VPcorpKt.appendChild(VPcropint);
              document.getElementById(x).remove();
                }
              if (file) {
                    reader.readAsDataURL(file); //reads the data as a URL
                } else {
                    PoundNote('Thông Báo','Bạn chưa chọn hình ảnh',1);
                }
            }
        </script>

                  <!-- <div class='row'>
                    <div class='group'>
                      <div id='groupcrop'>
                        <div class='VPcrop'>
                          <input class='VPcropint' id='VPcropint' value="" onchange="document.getElementById('TEXT_ID_1').value=this.files[0].name; previewFileimg('VPcropint')" name='logo 'type='file' accept="image/x-png, image/gif, image/jpeg"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <br>
                  <br> -->

              
                  <div>
                    <span class="mdl-switch__label">¿Es socio de la cámara de comercio e industria de Posadas?</span>
                    <br>
                    <br>
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch1">
                      <?php if($EmpresaModel['socio']==1){?>
                         <input type="checkbox" name="socio" id="switch1" value="" class="mdl-switch__input" checked onclick="mostrar()" >
                      <?php }else {?>
                         <input type="checkbox" name="socio" id="switch1"  value="" class="mdl-switch__input" onclick="mostrar()">
                      <?php } ?>
                      <span class="mdl-switch__label"></span>
                    </label>
                    <br>
                    <br>
              
                    <!-- NUMERO DE socio-->
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="socio-m">
                      <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['numero_socio'];?>" name="numero_socio"
                        id="sample10" maxlength="6" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                      />
                      <label class="mdl-textfield__label" for="sample10">Nº de socio </label>
                      <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                    </div>
                    <br>

<!--PARTICIPA PROMOCIONES-->
                <script>
                    function mostrarparticipa(){
                    if (document.getElementById('switch2').checked == true) {
                      document.getElementById('sample111').style.display='block';
                      document.getElementById('sample121').style.display='block';
                      document.getElementById('sample131').style.display='block';
                      document.getElementById('sample141').style.display='block';
                      document.getElementById('sample151').style.display='block' ;
                      document.getElementById('sample11').required = true;
                      document.getElementById('sample12').required = true;
                      document.getElementById('sample13').required = true;
                      document.getElementById('sample14').required = true;
                      document.getElementById('sample15').required = true;
                      document.getElementById('conjunto1').style.display='block';
                      document.getElementById('conjunto2').style.display='block';
                      document.getElementById('conjunto3').style.display='block';
                      document.getElementById('conjunto4').style.display='block';
                      document.getElementById('conjunto5').style.display='block';
                      
                    }


                    if (document.getElementById('switch2').checked == false) {
                      document.getElementById('sample111').style.display='none';
                      document.getElementById('sample121').style.display='none';
                      document.getElementById('sample131').style.display='none';
                      document.getElementById('sample141').style.display='none';
                      document.getElementById('sample151').style.display='none';
                      document.getElementById('sample11').value="";
                      document.getElementById('sample12').value="";
                      document.getElementById('sample13').value="";
                      document.getElementById('sample14').value="";
                      document.getElementById('sample15').value="";
                      document.getElementById('sample11').required = false;
                      document.getElementById('sample12').required = false;
                      document.getElementById('sample13').required = false;
                      document.getElementById('sample14').required = false;
                      document.getElementById('sample15').required = false;
                      document.getElementById('conjunto1').style.display='none';
                      document.getElementById('conjunto2').style.display='none';
                      document.getElementById('conjunto3').style.display='none';
                      document.getElementById('conjunto4').style.display='none';
                      document.getElementById('conjunto5').style.display='none';
                      }
                    }
                </script>
                    <div>
                      <span class="mdl-switch__label">Adhesión a las promociones especiales de los Bancos para compras con tarjetas durante los días del evento. (Consultar las bases y condiciones para cada entidad crediticia que participa del evento) ¿Desea tener el beneficio de los bancos? *</span>
                      <br>
                      <br>
                      
                      <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch2">
                        <?php if($EmpresaModel['participa_promociones']==1){?>
                          <input type="checkbox" name="participa_promociones" id="switch2" value="" class="mdl-switch__input" checked onclick="mostrarparticipa()">
                      <?php }else {?>
                         <input type="checkbox" name="participa_promociones" id="switch2"  value="" class="mdl-switch__input" onclick="mostrarparticipa()">
                      <?php } ?>
                        <span class="mdl-switch__label"></span>
                      </label>
                      <br>
                      <br>
                    </div>
                    <br>

                <script>
                    function sample111() {
                      if (document.getElementById('sample11').value.length < 8) {
                        document.getElementById('error1').style.display='block'
                        document.getElementById('success1').style.display='none'
                        document.getElementById('save').setAttribute("disabled","disabled")  
                      }else{
                        document.getElementById('error1').style.display='none'
                        document.getElementById('success1').style.display='block'
                      }
                      if (document.getElementById('switch2').checked == false){
                        document.getElementById('error1').style.display='none'
                        document.getElementById('success1').style.display='none'
                        document.getElementById('save').removeAttribute("disabled");   
                      }
                      if (document.getElementById('sample11').value.length == 0)  {
                        document.getElementById('error1').style.display='none'
                        document.getElementById('success1').style.display='none' 
                      }
                    }
                    function sample121() {
                      if (document.getElementById('sample12').value.length != 8) {
                        document.getElementById('error2').style.display='block'
                        document.getElementById('success2').style.display='none'
                        document.getElementById('save').setAttribute("disabled","disabled")  
                      }else{
                        document.getElementById('error2').style.display='none'
                        document.getElementById('success2').style.display='block'
                      }
                      if (document.getElementById('switch2').checked == false){
                        document.getElementById('error2').style.display='none'
                        document.getElementById('success2').style.display='none'
                        document.getElementById('save').removeAttribute("disabled");   
                      }
                      if (document.getElementById('sample12').value.length == 0) {
                        document.getElementById('error2').style.display='none'
                        document.getElementById('success2').style.display='none'
                      }
                    }
                    function sample131() {
                      if (document.getElementById('sample13').value.length != 8) {
                        document.getElementById('error3').style.display='block'
                        document.getElementById('success3').style.display='none'
                        document.getElementById('save').setAttribute("disabled","disabled")  
                      }else{
                        document.getElementById('error3').style.display='none'
                        document.getElementById('success3').style.display='block'
                      }
                      if (document.getElementById('switch2').checked == false){
                        document.getElementById('error3').style.display='none'
                        document.getElementById('success3').style.display='none'
                        document.getElementById('save').removeAttribute("disabled");   
                      }
                      if (document.getElementById('sample13').value.length == 0) {
                        document.getElementById('error3').style.display='none'
                        document.getElementById('success3').style.display='none' 
                      }

                    }
                    function sample141() {
                      if (document.getElementById('sample14').value.length != 8) {
                        document.getElementById('error4').style.display='block'
                        document.getElementById('success4').style.display='none'
                        document.getElementById('save').setAttribute("disabled","disabled")  
                      }else{
                        document.getElementById('error4').style.display='none'
                        document.getElementById('success4').style.display='block'
                      }
                      if (document.getElementById('switch2').checked == false){
                        document.getElementById('error4').style.display='none'
                        document.getElementById('success4').style.display='none'
                        document.getElementById('save').removeAttribute("disabled");   
                      }
                      if (document.getElementById('sample14').value.length == 0) {
                        document.getElementById('error4').style.display='none'
                        document.getElementById('success4').style.display='none'
                      }
                    }
                    function sample151() {
                        if (document.getElementById('sample15').value.length != 8) {
                        document.getElementById('error5').style.display='block'
                        document.getElementById('success5').style.display='none'
                        document.getElementById('save').setAttribute("disabled","disabled")      
                      }else{
                        document.getElementById('error5').style.display='none'
                        document.getElementById('success5').style.display='block'
                      }
                      if (document.getElementById('switch2').checked == false){
                        document.getElementById('error5').style.display='none'
                        document.getElementById('success5').style.display='none'  
                        document.getElementById('save').removeAttribute("disabled");          
                      }  
                      if (document.getElementById('sample15').value.length == "0") {
                        document.getElementById('error5').style.display='none'
                        document.getElementById('success5').style.display='none' 
                      }
                     
                    } 
                    function valida() {
                      if (document.getElementById('switch2').checked == true){
                        if (document.getElementById('success1').style.display=='block' && document.getElementById('success2').style.display=='block' && document.getElementById('success3').style.display=='block' && document.getElementById('success5').style.display=='block' && document.getElementById('success4').style.display=='block') {
                            document.getElementById('save').removeAttribute("disabled");
                        }
                      }
                    }
                    </script>

                    <div>
                      <!-- NUMERO DE TERMINAL-->
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="sample111">
                        <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['numero_terminal'];?>" name="numero_terminal"
                          id="sample11" maxlength="8" onblur="sample111()"  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);sample111();valida()"
                        />
                        <label class="mdl-textfield__label" for="sample11">Nº de Terminal </label>
                        <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                      </div> 
                       <div class="conjunto1"  id="conjunto1">
                        <div class="alert-box error"  id="error1"><span>error: </span>Tienes que ingresar 8 números.</div>
                        <div class="alert-box success"  id="success1"><span>correto: </span>Los datos son correctos.</div>
                        </div>
                    
                      <!-- NUMERO DE VISA-->
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="sample121">
                        <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['numero_visa'];?>" name="numero_visa"
                          id="sample12" maxlength="8"   oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);sample121();valida()"
                        />
                        <label class="mdl-textfield__label" for="sample12">Nº de Establecimiento Visa * </label>
                        <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                        
                       </div> 
                       <div class="conjunto2" id="conjunto2">
                       <div class="alert-box error"  id="error2"><span>error: </span>Tienes que ingresar 8 números.</div>
                        <div class="alert-box success"  id="success2"><span>correto: </span>Los datos son correctos.</div>
                        </div>
                      
                    
                      <!-- NUMERO DE MASTERDCARD-->
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="sample131">
                        <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['numero_mastercard'];?>" name="numero_mastercard"
                          id="sample13" maxlength="8" onblur="sample131()" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);sample131();valida()"
                        />
                        <label class="mdl-textfield__label" for="sample13">Nº de Comercio Mastercard * </label>
                        <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                        </div>
                        <div class="conjunto3" id="conjunto3">
                        <div class="alert-box error"  id="error3"><span>error: </span>Tienes que ingresar 8 números.</div>
                        <div class="alert-box success"  id="success3"><span>correto: </span>Los datos son correctos.</div>
                        </div>
                      
                     
                      <!-- NUMERO DE AMEX-->
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="sample141">
                        <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['numero_amex'];?>" name="numero_amex" id="sample14"
                          maxlength="8" onblur="sample141()" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);sample141();valida()"
                        />
                        <label class="mdl-textfield__label" for="sample14">Nº de Establecimiento Amex * </label>
                        <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                        </div>
                        <div class="conjunto4" id="conjunto4">
                        <div class="alert-box error"  id="error4"><span>error: </span>Tienes que ingresar 8 números.</div>
                        <div class="alert-box success"  id="success4"><span>correto: </span>Los datos son correctos.</div>
                        </div>
                      
                 
                      <!-- NUMERO DE NATIVA-->
                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="sample151">
                        <input class="mdl-textfield__input" type="number" value="<?php echo $EmpresaModel['numero_nativa'];?>" name="numero_nativa"
                          id="sample15" onblur="sample151()" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);sample151();valida()"
                        />
                        <label class="mdl-textfield__label" for="sample15">Nº de Establecimiento Nativa * </label>
                        <span class="mdl-textfield__error">¡Ingrese solo números!</span>
                       </div>
                        <div class="conjunto5" id="conjunto5">
                        <div class="alert-box error"  id="error5"><span>error: </span>Tienes que ingresar 8 números.</div>
                        <div class="alert-box success"  id="success5"><span>correto: </span>Los datos son correctos.</div>
                        </div>
                      
                    </div>
                   
                    
                    <input class="mdl-button" type="hidden" name="id_empresa" value="<?php echo $EmpresaModel['id_empresa'];?>">
                    <input class="mdl-button" type="hidden" name="operacion" value="editar">
                    <input class="mdl-button" type="submit" id="save" name="save" value="Guardar cambios">

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
                                <label class="mdl-textfield__label" for="editar<?php echo  $muestra['id_rubro'];?>">Guardar cambios</label>
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

        </div>
        <?php include_once("parts/preguntas_frecuentes.php"); ?>
    </main>
    </div>

    <script src="../material.js"></script>
    <script src="../getmdl-select.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</body>

</html>