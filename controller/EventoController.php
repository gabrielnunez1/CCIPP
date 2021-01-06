<?php
include_once("../model/EventoModel.php");
	class EventoController {
		function __construct(){
			write_log("EventoController","__construct ()","La Clase EventoController se creo correctamente.");
		}

		public function listar(){
			write_log("EventoController","listar()","sin comentario");
			$conexion=new Conexion();
					$sql ="SELECT * FROM `eventos`";
					$resultado = $conexion->consultar($sql);
					return $resultado;
		}		
	}
?>

<?php


	if(!empty($_POST["visible"])) {
		$a=$_POST["visible"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM eventos WHERE (id_evento='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($muestra = mysqli_fetch_array($resultado)) { 
				if($muestra['visible']==1){
					write_log("InformeModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE eventos SET visible=0 WHERE (id_evento='$a')";
					$conexion->ejecutar($sql);
				}
		
				if($muestra['visible']==0){
					write_log("InformeModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE eventos SET visible=1 WHERE (id_evento='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}






	if (!empty($_POST['operacion']) and $_POST['operacion']=="crear") {
		$descripcion=$_POST['descripcion'];
		$nombre=$_POST['nombre'];
		$visible=$_POST['visible'];
		$dir_subida = '../img/';




		$fichero_subido = $dir_subida . basename($_FILES['logo']['name']);
		
		if (move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/evento".$_FILES['logo']['size'].".png");
		}
		$datosimagen1 = "evento".$_FILES['logo']['size'].".png";
		
		

		$EventoModel=new EventoModel($descripcion, $nombre, $datosimagen1, $visible);
		$EventoModel->crear();
		header("Location:../view/admin_panel_evento.php");


	}
	if (!empty($_POST['operacion']) and $_POST['operacion']=="editar") {
		echo $_POST['operacion'];
		echo $_POST['id_evento'];
	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="eliminar") {
		echo $_POST['operacion'],$_POST['id_evento'];
		$EventoModel=new EventoModel('descripcion','nombre',"fecha_inicio","fecha_fin",'logo');
		$results = $EventoModel->eliminar($_POST['id_evento']);
		header("Location:../view/admin_panel_evento.php");
	}

	// $EventoModel=new EventoModel("aaa","aabe","2018-10-02" ,"2018-10-02" ,"logp");
	// $EventoModel->crear()
		
	// $EventoModel=new EventoModel("aaa","be","2018-10-10" ,"2018-10-02" ,"logp");
	// $EventoModel->editar(1);

	// $EventoModel=new EventoModel("aaa","aabe","2018-10-02" ,"2018-10-02" ,"logp");
	// $EventoModel->eliminar(2);

 ?>
