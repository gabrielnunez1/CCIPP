<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
    <style>
        .mdi-tag::before {
            margin-top: 4px;
        }
        .mdl-menu--multi-column {
            padding: 8px;
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            -webkit-column-gap: 0;
            -moz-column-gap: 0;
            column-gap: 0;
        }
        
        .mdl-layout__header--waterfall {
            overflow: visible;
        }
        
        .mdl-layout__header--waterfall.is-compact {
            overflow: hidden;
        }
        
        .mdl-card__title {
            flex-direction: column;
            justify-content: flex-end;
        }
        
        .mdl-card__title-text,
        .mdl-card__subtitle-text {
            align-self: flex-start;
        }
        
        .mdl-card__supporting-text {
            width: inherit;
            box-sizing: border-box;
        }
        
        .mdl-layout__content {
            background: #f2f2f2;
        }
        
        .mdl-layout__header .mdl-textfield .mdl-button {
            bottom: 18px;
            /* MDL default value: 20px */
        }
        
        #block-mcsrc-search [id^="edit-actions"] {
            padding: 0;
            border-top: none;
        }
        
        .mdl-layout__header .mdl-textfield--expandable,
        .mdl-layout__header button.mdl-button--icon {
            margin-left: 8px;
            margin-right: 8px;
        }
    </style>

    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
            </div>
            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link" href="club.php">Club de descuentos</a>
                    <a class="mdl-navigation__link" href="articulos.php">Ver articulos</a>

                    <?php
        if (isset($_SESSION['logged'])){ ?>
                        <a class="mdl-navigation__link android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width" href="iniciar.php">
                            <button id="perfil-demo" class="mdl-button mdl-js-button mdl-button--icon">
                                <i class="material-icons">person</i>
                            </button>
                            <span class="mdl-tooltip" for="perfil-demo">Perfil</span>
                        </a>
                        <?php
        }else{
          ?>
                            <a class="mdl-navigation__link" href="registro.php">Registrar comercio</a>
                            <a class="mdl-navigation__link" href="iniciar.php">Iniciar sesión</a>

                            <?php
                                }
                                    ?>
                                <a class="mdl-navigation__link">
                                    <button id="category-demo" class="mdl-button mdl-js-button mdl-button--icon">
                                        <i class="material-icons">style</i>
                                    </button>
                                    <span class="mdl-tooltip" for="category-demo">Categorias</span>
                                </a>
                                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-menu--multi-column" for="category-demo">
                                    <?php
                                    include_once("../controller/RubroController.php");
                                    $RubroController=new RubroController();
                                    $resultado=$RubroController->listar();
                                    if(isset($resultado)){
                                        while ($muestra = mysqli_fetch_array($resultado)) {?>
                                                                    <a class="mdl-navigation__link" href="articulos.php?rubro=<?php echo $muestra['id_rubro'];?>&operacion=listar">
                                                                        <li class="mdl-menu__item">
                                                                            <?php echo $muestra['descripcion'];?>
                                                                        </li>
                                                                    </a>
                                                                    <?php
                                                                        };
                                                                    }?>
                </nav>
            </div>
        </div>
    </div>
    <div class="android-drawer mdl-layout__drawer">
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="iniciar.php">Perfil</a>
            <?php
      include_once("../controller/RubroController.php");
      $RubroController=new RubroController();
      $resultado=$RubroController->listar();
      if(isset($resultado)){
       while ($muestra = mysqli_fetch_array($resultado)) {
    ?>
                <a class="mdl-navigation__link" href="articulos.php?rubro=<?php echo $muestra['id_rubro'];?>&operacion=listar">
                    <?php echo $muestra['descripcion'];?>
                </a>
                <?php
        };
      }
    ?>
                    <div class="android-drawer-separator"></div>
                    <div class="android-drawer-separator"></div>
        </nav>
    </div>