<?php
include_once("../model/RubroModel.php");
	class RubroController {
		function __construct(){
			write_log("RubroController","__construct ()","La Clase RubroController se creo correctamente.");
		}

		public function listar(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `rubro`";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}		
	}
?>

<?php
	if (!empty($_POST['operacion']) and $_POST['operacion']=="crear") {
		$descripcion=$_POST['descripcion'];
		$RubroModel=new RubroModel($descripcion);
		$RubroModel->crear($descripcion);	
		header("Location:../view/admin_panel_rubro.php#administrar-rubro");
	}
	if (!empty($_POST['operacion']) and $_POST['operacion']=="editar") {
	
		$id_rubro=$_POST['id_rubro'];
		$descripcion=$_POST['descripcion'];
		$RubroModel=new RubroModel($descripcion);
		$RubroModel->editar($id_rubro);	
		header("Location:../view/admin_panel_rubro.php#administrar-rubro");
	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="eliminar") {
		echo $_POST['operacion'],$_POST['id_rubro'];
		$RubroModel=new RubroModel('descripcion');
		$results = $RubroModel->eliminar($_POST['id_rubro']);
		header("Location:../view/admin_panel_rubro.php#administrar-rubro");
	}
 ?>