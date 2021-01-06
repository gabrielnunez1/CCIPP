<?php
	include_once("../conexion/conexion.php");
	class EmpresaEventoController {
		function __construct(){
			write_log("EmpresaEventoController","__construct ()","La Clase EmpresaEventoController se creo correctamente.");
		}
	
		public function seleccionarEmpresasDelEvento($id_evento){
			write_log("EmpresaEventoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `empresa_evento` WHERE `id_evento`=$id_evento and `peticion`= 1";

			$resultado = $conexion->consultar($sql);
			return $resultado;
		}		
	}



	if(  isset($_POST["operacion"])    and      $_POST["operacion"]=="actualizar_estado"  ) {

	var_dump($_POST);
		$id_empresa_evento=$_POST["id_empresa_evento"];
		if ($_POST["estado"]==1) {
		
			$conexion=new Conexion();
			$sql ="UPDATE `empresa_evento` SET `estado`=0 WHERE `id_empresa_evento`= $id_empresa_evento ";
			$conexion->ejecutar($sql);
		}else{

			$conexion=new Conexion();
			$sql ="UPDATE `empresa_evento` SET `estado`=1 WHERE `id_empresa_evento`= $id_empresa_evento ";
			$conexion->ejecutar($sql);
		}
		if (isset($_POST["id_evento"])) {
			$id_evento=$_POST["id_evento"];
			header("Location:../view/admin_panel_comerciante.php?operacion_actualizar_estado=1&id_evento=$id_evento");
		}else{
			echo "error";
		}
		


		
	}






	if (isset($_POST['id_evento']) and $_POST['operacion']=="ser-parte" ) {
		
		session_start();

		$id_empresa=$_SESSION['id_empresa'];
		$id_evento=$_POST['id_evento'];


		write_log("EmpresaEventoController","listar()","sin comentario");
		$conexion=new Conexion();
		$sql ="INSERT INTO `empresa_evento`(`id_empresa`, `id_evento`, `estado`, `peticion`) VALUES ($id_empresa,$id_evento,0,1)";

		$resultado = $conexion->consultar($sql);
		

			header("Location:../view/admin_panel_empresa_evento.php");


	}
	


?>
