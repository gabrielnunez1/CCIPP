<?php
include_once("../model/PersonaModel.php");
	class PersonaController {
		function __construct(){
		}
		public function listar(){
			$busqueda=new PersonaModel('dni','nombre', 'apellido', 'fecha', 'direccion', 'telefono', 'correo', 'cuil', 'persona_usuario', 'persona_password');
			$res = $busqueda->listar();
			return  $res;
		}
	}
?>

<?php

	if (!empty($_POST['operacion']) and $_POST['operacion']=="crear_usuario") {
		$dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $fecha=$_POST['fecha'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
		$cuil=$_POST['cuil'];
		$persona_usuario=$_POST['persona_usuario'];
		$persona_password=$_POST['persona_password'];
		
		$PersonaModel=new PersonaModel($dni,$nombre, $apellido, $fecha, $direccion, $telefono, $correo, $cuil, $persona_usuario, $persona_password );
		$PersonaModel->crear();

	}
	if (!empty($_POST['operacion']) and $_POST['operacion']=="editar") {
		echo $_POST['operacion'];
		echo $_POST['personas_id'];
	}


	if (!empty($_POST['operacion']) and $_POST['operacion']=="eliminar") {
		echo $_POST['operacion'],$_POST['persona_id'];
		

		$PersonaModel=new PersonaModel('dni','nombre', 'apellido', 'fecha', 'direccion', 'telefono', 'correo', 'cuil', 'persona_usuario', 'persona_password');
		$results = $PersonaModel->eliminar($_POST['persona_id']);
		header("Location:../view/persona_listar.php");

	}


 ?>
	


	

