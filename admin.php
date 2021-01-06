<?php session_start(); 
if ($_SESSION == true) {
    header('Location: admin_panel_cargar_producto.php');
  }?>
<link rel="stylesheet" href="material.css">
<link rel="stylesheet" href="styles-mdl-tudexgames.css">
<script src="material.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <img src="view/images/ccip_logo.png" style="width: 55px;height: 50px; margin-right: 68px; ">
  
            <!-- Title -->
            <span class="mdl-layout-title">Inicia sesión como administrador</span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>



            

        </div>
    </header>
    
    <main class="mdl-layout__content">
        <div class="page-content">
            <!-- Your content goes here -->
            <div class="android-more-section">
                <div class="android-card-container mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col">



                        <style>
                            .demo-card-wide.mdl-card {
                                width: 100%;
                            }
                        </style>

                        <div class="demo-card-wide mdl-card mdl-shadow--2dp">

                            <div class="mdl-card__supporting-text">




                                <form action="controller/LoginController.php" method="post">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="usuario" id="empresa_imput" required="" />
                                        <label class="mdl-textfield__label" for="empresa_imput">Usuario</label>
                                    </div>
                                    <br>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="password" name="password" id="empresa_imput" required="" />
                                        <label class="mdl-textfield__label" for="empresa_imput">Contraseña</label>
                                    </div>
                                    <br>

                                    <input type="hidden" name="operacion" value="admin">
                                    <input class="mdl-button" type="submit">
                                </form>
                            </div>

                        </div>



                    </div>
                    <div class="mdl-cell mdl-cell--8-col">
<!-- Wide card with share menu button -->
                        <style>
                        .demo-card-wide > .mdl-card__title {
                        color: #fff;
                        height: 380px;
                        background: url('view/images/manos.png') center / cover;
                        }
                        .demo-card-wide > .mdl-card__menu {
                        color: #fff;
                        }
                        </style>

                        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Qué bueno volver a verte</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            Envianos está información para verificar tu sesión.
                        </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



      

    </main>
</div>



