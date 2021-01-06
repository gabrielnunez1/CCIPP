<!doctype html>
<html lang="es-AR">

<head> 
<link rel="stylesheet" href="../material.css">
<link rel="stylesheet" href="../styles-mdl-tudexgames.css">
<script src="../material.js"></script>
<title>Cámara de Comercio e Industria de Posadas</title>
<link rel="shortcut icon" href="images/favicon.png">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
        <?php include_once("parts/logo.php"); ?>
            <!-- Title -->
         
            <!-- Add spacer, to align navigation to the right -->
        
            <!--incluir Navigation-->
            <?php include_once("parts/new-navigation.php"); ?>
            <!--incluir Navigation-->
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
                                <form action="../controller/EmpresaController.php" method="post">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="nombre_fantasia" id="empresa_imput" required="" />
                                        <label class="mdl-textfield__label" for="empresa_imput">Nombre de fantasia</label>
                                    </div>
                                    <br>
                    
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="number" name="telefono" id="empresa_imput" required="" />
                                        <label class="mdl-textfield__label" for="empresa_imput">Teléfono</label>
                                    </div>
                                    <br>
                                   
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="email" name="correo" id="empresa_imput" required="" />
                                        <label class="mdl-textfield__label" for="empresa_imput">Correo</label>
                                    </div>
                                    <br>
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
                                    <br>
                                
                                    <input type="hidden" name="operacion" value="crear">
                                    <input class="mdl-button" type="submit" value="Registrar comercio">

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
                        background: url('images/paracaidas.png') center / cover;
                        }
                        .demo-card-wide > .mdl-card__menu {
                        color: #fff;
                        }
                        </style>

                        <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title">
                            <h2 class="mdl-card__title-text">Bienvenido</h2>
                        </div>
                        <div class="mdl-card__supporting-text">
                            Hola, completa este formulario y comienza a ser parte del evento.
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--incluir footer-->
        <?php include_once("parts/footer.php"); ?>
        <!--incluir footer-->

    </main>
</div>