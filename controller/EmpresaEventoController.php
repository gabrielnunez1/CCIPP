<?php
	class EmpresaEventoController {
		function __construct(){
			write_log("EmpresaEventoController","__construct ()","La Clase EmpresaEventoController se creo correctamente.");
		}

		public function listarEmpresaEventoController($id_evento,$id_empresa){
            write_log("EmpresaEventoController", "listar()", "sin comentario");
            $conexion=new Conexion();
			$sql ="SELECT * FROM `empresa_evento` where id_evento=$id_evento and id_empresa=$id_empresa";
			$resultado = $conexion->consultar($sql);

        	return $resultado;
		}
	}
?>

<?php


	if(!empty($_POST["peticion"])) {
		$a=$_POST["peticion"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM empresa_evento WHERE (id_empresa_evento='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($muestra = mysqli_fetch_array($resultado)) { 
				if($muestra['peticion']==1){
					write_log("InformeModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresa_evento SET peticion=0 WHERE (id_empresa_evento='$a')";
					$conexion->ejecutar($sql);
				}
		
				if($muestra['peticion']==0){
					write_log("InformeModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresa_evento SET peticion=1 WHERE (id_empresa_evento='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}


	if(!empty($_POST["estado"])) {
		$a=$_POST["estado"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM empresa_evento WHERE (id_empresa_evento='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($muestra = mysqli_fetch_array($resultado)) { 
				if($muestra['estado']==1){
					write_log("InformeModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresa_evento SET estado=0 WHERE (id_empresa_evento='$a')";
					$conexion->ejecutar($sql);
				}
		
				if($muestra['estado']==0){
					write_log("InformeModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresa_evento SET estado=1 WHERE (id_empresa_evento='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}






	if (!empty($_POST['operacion']) and $_POST['operacion']=="crear") {
        $id_empresa=$_POST['id_empresa'];
        $id_evento=$_POST['id_evento'];
        $estado=null;
        $peticion=null;
        

		$EventoModel=new EventoModel($id_empresa,$id_evento,$peticion,$estado);
		$EventoModel->crear();
		header("Location:../view/admin_panel_empresa_evento.php");


	}
	if (!empty($_POST['operacion']) and $_POST['operacion']=="editar") {
		echo $_POST['operacion'];
		echo $_POST['id_empresa_evento'];
	}



	if (!empty($_POST['operacion']) and $_POST['operacion']=="eliminar") {
		echo $_POST['operacion'],$_POST['id_evento'];
		$EventoModel=new EventoModel('descripcion','nombre',"fecha_inicio","fecha_fin",'logo');
		$results = $EventoModel->eliminar($_POST['id_evento']);
		header("Location:../view/admin_panel_empresa_evento.php");
	}


 ?>
