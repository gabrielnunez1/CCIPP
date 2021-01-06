<?php 
   if ($_SESSION['tipo'] == 'empresa') { ?>
<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
   <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Panel de administración</span>
      <div class="mdl-layout-spacer"></div>
   </div>
</header>
<div class="demo-drawer mdl-layout__drawer mdl-color--grey-100 mdl-color-text--grey-600">
   <header class="demo-drawer-header">
      <div class="logo">
         <img src="../view/images/ccip_logo.png" height="150" width="150">
      </div>
      <div class="demo-avatar-dropdown">
         <div class="comercio">
            <?php
               include_once("../controller/EmpresaController.php");
               $EmpresaController=new EmpresaController();
               $resultado=$EmpresaController->listarLaEmpresaDeEstaSesion($_SESSION['id_empresa']);   
               if(isset($resultado)){
               $contador_notificacion_pendiente=0;
               while ($muestra = mysqli_fetch_array($resultado)) {
                   $razon_social=$muestra['razon_social'];
                   $cuit=$muestra['cuit'];
                   $rubro=$muestra['rubro'];
                   $responsable=$muestra['responsable'];
                   $direccion=$muestra['direccion'];
                   $provincia=$muestra['provincia'];
                   $localidad=$muestra['localidad'];
                   $celular=$muestra['celular'];
                   $logo=$muestra['logo'];
                   $socio=$muestra['socio'];
                   $numero_socio=$muestra['numero_socio'];
                   $participa_promociones=$muestra['participa_promociones'];
                   $numero_terminal=$muestra['numero_terminal'];
                   $numero_visa=$muestra['numero_visa'];
                   $numero_mastercard=$muestra['numero_mastercard'];
                   $numero_amex=$muestra['numero_amex'];
                   $numero_nativa=$muestra['numero_nativa'];
                   $usuario=$muestra['usuario'];
                   $password=$muestra['password'];          
                   $visible=$muestra['visible'];
                   }
               }
               if ($visible==0) {
                echo" la camara de comercio no verifico";
               }
               if ($razon_social==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }                  
               if ($cuit==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($rubro==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($responsable==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($direccion==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($provincia==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($localidad==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($celular==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }
               if ($logo==null) {
                   $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
               }   

               if ($socio==1) {
                   if ($numero_socio==null) {
                       $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
                   }else{
                        
                   }
               }
               if ($participa_promociones==1) {
                    if ($numero_terminal==null) {
                        $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
                    }else{
                     
                    }
                    if ($numero_visa==null) {
                        $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
                    }else{
                     
                    }
                    if ($numero_mastercard==null) {
                        $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
                    }else{
                     
                    }
                    if ($numero_amex==null) {
                        $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
                    }else{
                     
                    }
                    if ($numero_nativa==null) {
                        $contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
                    }else{
                     
                    }

                }       


               ?>
            <h6>
               <!-- Number badge -->
               <span class="mdl-badge" data-badge="<?php echo $contador_notificacion_pendiente  ?>">
               <?php echo $_SESSION['nombre_fantasia']; ?>
               </span>
            </h6>
         </div>
      </div>
   </header>
   <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
      <!-- si la cantidad de notifcaciones pendientes  es distinto a cero la condicion muestra el menu especial donde el usuario solo puede completar los datos o salir-->
      <?php if ($contador_notificacion_pendiente!=0) {?>
      <a class="mdl-navigation__link" href="admin_panel_editar_comerciante.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">domain</i>Comercio
      </a>
      <a class="mdl-navigation__link" href="../controller/cerrar.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Cerrar sesión
      </a>
      <?php }else{
         ?>
      <a class="mdl-navigation__link" href="admin_panel_empresa_evento.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add</i>Adherirse a eventos
      </a>
      <a class="mdl-navigation__link" href="admin_panel_cargar_producto.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add_shopping_cart</i>Administrar articulos
      </a>
      <a class="mdl-navigation__link" href="admin_panel_editar_comerciante.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">domain</i>Comercio
      </a>
      <a class="mdl-navigation__link" href="articulos.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">visibility</i>Ver como usuario
      </a>

      <a class="mdl-navigation__link" href="../controller/cerrar.php">
      <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">exit_to_app</i>Cerrar sesión</a>
      <div class="mdl-layout-spacer"></div>
   </nav>
   <?php }?>
</div>
<?php }?>
<!-- INICIA SECION COMO ADMIN -->
<?php if ($_SESSION['tipo'] == 'admin') { ?>
<header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
   <div class="mdl-layout__header-row">
      <span class="mdl-layout-title">Panel de administración</span>
      <div class="mdl-layout-spacer"></div>
   </div>
</header>
<div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
    <header class="demo-drawer-header">
        <div class="demo-avatar-dropdown">
            <?php echo $_SESSION['nombre_fantasia']; ?>
            <div class="mdl-layout-spacer"></div>
        </div>
    </header>

    <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
        <a class="mdl-navigation__link" href="admin_panel.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">trending_up</i>Estadisticas</a>

        <a class="mdl-navigation__link" href="admin_panel_evento.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i>Gestión de eventos</a>

        <a class="mdl-navigation__link" href="admin_panel_comerciante_evento.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">domain</i>Gestión de comercio</a>
        <!--      <a class="mdl-navigation__link" href="editar_comerciante.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">edit</i>Editar Comerciante</a>
    <a class="mdl-navigation__link" href="admin_panel_rubro.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">shopping_cart</i>Purchases</a>
   -->


        <a class="mdl-navigation__link" href="admin_panel_rubro.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">style</i>Rubros de Articulos</a>
        <!--  <a class="mdl-navigation__link" href="admin_panel_cargar_producto.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">add</i>Cargar Producto</a>
        -->




        <a class="mdl-navigation__link" href="articulos.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">visibility</i>Ver como usuario</a>

        <a class="mdl-navigation__link" href="../controller/cerrar.php">
            <i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Cerrar sesión</a>

        <div class="mdl-layout-spacer"></div>
    </nav>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<?php }?>