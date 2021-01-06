
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<div class="container">	
			<!-- Codrops top bar -->
			<div class="codrops-top clearfix">
			
			</div><!--/ Codrops top bar -->
			<header class="clearfix" style="padding-bottom: 60px;">
			<h1><?php echo $muestra['nombre'];?></h1>
			<br>

				<br>
				<br>
			<span ><?php echo $muestra['descripcion'];?></span>
			</header>
			<div class="main">
				<div id="mi-slider" class="mi-slider">
					
					<?php 
					if(isset($muestra['imagen']) and $muestra['imagen']!=""){	
					?>
					<ul>
						<li><a href="#"><img src="../img/<?php echo $muestra['imagen']; ?>"></a></li>
					</ul>
					<?php
					} ?>

					<?php 
					if(isset($muestra['imagen2']) and $muestra['imagen2']!=""){	
					?>
					<ul>
						<li><a href="#"><img src="../img/<?php echo $muestra['imagen2'];?>"></a></li>
					</ul>
					<?php
					} ?>


					<?php 
					if(isset($muestra['imagen3']) and $muestra['imagen3']!=""){	
					?>
					<ul>
						<li><a href="#"><img src="../img/<?php echo $muestra['imagen3'] ?>"></a></li>
					</ul>	
					<?php
					} ?>
					<?php 
					if(isset($muestra['imagen4']) and $muestra['imagen4']!=""){	
					?>
					<ul>
						<li><a href="#"><img src="../img/<?php echo $muestra['imagen4'] ?>"></a></li>
					</ul>	
					<?php
					} ?>
										<?php 
					if(isset($muestra['imagen5']) and $muestra['imagen5']!=""){	
					?>
					<ul>
						<li><a href="#"><img src="../img/<?php echo $muestra['imagen5'] ?>"></a></li>
					</ul>	
					<?php
					} ?>

					<nav>
						<?php 
						if(isset($muestra['imagen']) and $muestra['imagen']!=""){	
						?>
							<a href="#"><i class="material-icons">looks_one</i></a>
							<?php
						} ?>
						<?php 
						if(isset($muestra['imagen2']) and $muestra['imagen2']!=""){	
						?>
							<a href="#"><i class="material-icons">looks_two</i></a>
							<?php
						} ?>
						<?php 
						if(isset($muestra['imagen3']) and $muestra['imagen3']!=""){	
						?>
							<a href="#"><i class="material-icons">looks_3</i></a>
							<?php
						} ?>
						<?php 
						if(isset($muestra['imagen4']) and $muestra['imagen4']!=""){	
						?>
							<a href="#"><i class="material-icons">looks_4</i></a>
							<?php
						} ?>
						<?php 
						if(isset($muestra['imagen5']) and $muestra['imagen5']!=""){	
						?>
							<a href="#"><i class="material-icons">looks_5</i></a>
							<?php
						} ?>
					</nav>
					
				</div>
			</div>
		</div><!-- /container -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/jquery.catslider.js"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>

