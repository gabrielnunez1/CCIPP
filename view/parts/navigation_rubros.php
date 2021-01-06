<div class="mdl-layout__drawer">
  <span class="mdl-layout-title">Rubros</span>
  <nav class="mdl-navigation">
    <?php
    include_once("../controller/RubroController.php");
    $RubroController=new RubroController();
    $resultado=$RubroController->listar();
    if(isset($resultado)){
      while ($muestra = mysqli_fetch_array($resultado)) {?>
          <a class="mdl-navigation__link" href="articulos.php?rubro=<?php echo $muestra['id_rubro'];?>&operacion=listar"><?php echo $muestra['descripcion'];?></a>
          <?php }; } ?>
  </nav>
</div>