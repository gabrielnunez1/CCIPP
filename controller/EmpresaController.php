<?php
	include_once("../model/EmpresaModel.php");
	class EmpresaController {
		function __construct(){
			write_log("EmpresaController","__construct ()","La Clase EmpresaController se creo correctamente.");
		}
		public function listarLaEmpresaDeEstaSesion($id){
			write_log("ProductoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `empresas` WHERE `id_empresa`=$id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		
		public function exportarLaEmpresaDeEstaSesion($id){
			write_log("ProductoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT  UPPER(razon_social),  UPPER(nombre_fantasia),  UPPER(numero_visa),  UPPER(numero_mastercard),  UPPER(numero_amex),  UPPER(numero_terminal),  UPPER(direccion),  UPPER(localidad),  UPPER(provincia),  UPPER(rubro),  UPPER(cuit), UPPER(correo),  UPPER(telefono) FROM `empresas` WHERE `id_empresa`=$id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		public function listar(){
			write_log("EmpresaController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `empresas`";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		public function listarEmpresasDelClubbDeDescuentos(){
			write_log("EmpresaController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM empresas WHERE numero_socio <> ''";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		public function listarEmpresaEvento($id_empresa,$id_evento){
			write_log("EmpresaController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `empresas`";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		
		public function consultarEstadoDePublicador($usuario)
		{
			$conexion=new Conexion();
			$sql = "SELECT * FROM `empresas` WHERE `id_empresa` = $usuario";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		public function listarProductosQueParticipanDelEvento($evento)
		{
			$conexion=new Conexion();
			$sql = "SELECT * FROM `empresa_evento` INNER join empresas INNER JOIN productos WHERE empresa_evento.id_empresa = empresas.id_empresa and productos.usuario= empresas.id_empresa and productos.visible=1 and empresa_evento.estado=1 and empresa_evento.id_evento=$evento";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		
		public function listarProductosQueParticipanDelEventoYqueSonDeElRubro($evento,$rubro)
		{
			$conexion=new Conexion();
			$sql = "SELECT * FROM `empresa_evento` INNER join empresas INNER JOIN productos inner JOIN rubro WHERE empresa_evento.id_empresa = empresas.id_empresa and productos.usuario= empresas.id_empresa and productos.visible=1 and empresa_evento.estado=1 and empresa_evento.id_evento=$evento and rubro.descripcion=productos.rubro and rubro.id_rubro=$rubro";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}



	}

	if(!empty($_POST["visible"])) {
		$a=$_POST["visible"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM empresas WHERE (id_empresa='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($EmpresaModel = mysqli_fetch_array($resultado)) { 
				if($EmpresaModel['visible']==1){
					write_log("EmpresaModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresas SET visible=0 WHERE (id_empresa='$a')";
					$conexion->ejecutar($sql);
				}
	
				if($EmpresaModel['visible']==0){
					write_log("EmpresaModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresas SET visible=1 WHERE (id_empresa='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}

	if (!empty($_POST['id_empresa']) and $_POST['operacion']=="actualizar_estado") {


		$id_empresa=$_POST['id_empresa'];
		
		if ($_POST["visible"]==1) {
			$conexion=new Conexion();
			$sql ="UPDATE `empresas` SET `visible`=0 WHERE `id_empresa`=$id_empresa";
			$conexion->ejecutar($sql);
		}else{
			$conexion=new Conexion();
			$sql ="UPDATE `empresas` SET `visible`=1 WHERE `id_empresa`=$id_empresa";
			$conexion->ejecutar($sql);
		}
		header("Location:../view/admin_panel_club_de_descuentos.php");
	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="crear") {
		$razon_social=null;
		$nombre_fantasia=$_POST['nombre_fantasia'];
		$cuit=null;
		$telefono=$_POST['telefono'];
		$celular=null;
		$correo=$_POST['correo'];
		$rubro=null;
		$responsable=null;
		$socio=null;
		$provincia=null;
		$localidad=null;
		$numero_terminal=null;
		$numero_visa=null;
		$numero_mastercard=null;
		$numero_amex=null;
		$numero_nativa=null;
		$participa_promociones=null;
		$direccion=null;
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		$numero_socio=null;
		$logo=null;
		$visible=0;
		$EmpresaModel=new EmpresaModel($razon_social,$nombre_fantasia, $cuit, $telefono, $celular, $correo, $rubro, $responsable, $socio, $provincia, $localidad, $numero_terminal, $numero_visa, $numero_mastercard, $numero_amex, $numero_nativa,$participa_promociones, $direccion, $usuario, $password, $numero_socio, $logo,$visible);
		$resultado = $EmpresaModel->crear();

		$para      = $correo;
		$titulo    = 'Bienvenido';
		$mensaje   = 'Te has registrado, y en este correo te enviamos los datos para que inicies sesión. Tu usuario es: '.$usuario.' y tu contraseña es: '.$password;
mail($para, $titulo, $mensaje);

	
		header("Location:../view/iniciar.php");
	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="editar") {
		$id_empresa=$_POST['id_empresa'];
		$razon_social=$_POST['razon_social'];
		$nombre_fantasia=$_POST['nombre_fantasia'];
		$cuit=$_POST['cuit'];
		$telefono=$_POST['telefono'];
		$celular=$_POST['celular'];
		$correo=$_POST['correo'];
		$rubro=$_POST['rubro'];
		$responsable=$_POST['responsable'];
		$provincia=$_POST['provincia'];
		$localidad=$_POST['localidad'];
		$numero_terminal=$_POST['numero_terminal'];
		$numero_visa=$_POST['numero_visa'];
		$numero_mastercard=$_POST['numero_mastercard'];
		$numero_amex=$_POST['numero_amex'];
		$numero_nativa=$_POST['numero_nativa'];
		$direccion=$_POST['direccion'];
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		$numero_socio=$_POST['numero_socio'];
		if (isset($_POST['socio'])){
			$socio=1;
		}else{
			$socio=0;
		}
		if (isset($_POST['participa_promociones'])){
			$participa_promociones=1;
		}else{
			$participa_promociones=0;
		}



		

		$dir_subida = '../img/';
		$fichero_subido = $dir_subida . basename($_FILES['logo']['name']);
		
		if (move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/empresa".$_FILES['logo']['size'].".png");
		}

		if (isset($_FILES['logo']) and  $_FILES['logo']['name']!="" ) {
            $datosimagen1 ="../img/empresa".$_FILES['logo']['size'].".png";
		}else{
            if (isset($_POST['TEXT_ID_1']) and  $_POST['TEXT_ID_1']!="") {
                $datosimagen1 =($_POST['TEXT_ID_1']);
            }else{
                $datosimagen1=null;
            }
		}
		$visible=0;
		$EmpresaModel=new EmpresaModel($razon_social,$nombre_fantasia, $cuit, $telefono, $celular, $correo, $rubro, $responsable, $socio, $provincia, $localidad, $numero_terminal, $numero_visa, $numero_mastercard, $numero_amex, $numero_nativa,$participa_promociones, $direccion, $usuario, $password, $numero_socio, $datosimagen1, $visible);
		$EmpresaModel->editar($id_empresa);
		header("Location:../view/admin_panel_editar_comerciante.php");
	}

	if(!empty($_POST["socio"])) {
		$a=$_POST["socio"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM empresas WHERE (id_empresa='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($EmpresaModel = mysqli_fetch_array($resultado)) { 
				if($EmpresaModel['socio']==1){
					write_log("EmpresaModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresas SET socio=0 WHERE (id_empresa='$a')";
					$conexion->ejecutar($sql);
				}
		
				if($EmpresaModel['socio']==0){
					write_log("EmpresaModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresas SET socio=1 WHERE (id_empresa='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}

	if(!empty($_POST["participa_promociones"])) {
		$a=$_POST["participa_promociones"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM empresas WHERE (id_empresa='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($EmpresaModel = mysqli_fetch_array($resultado)) { 
				if($EmpresaModel['participa_promociones']==1){
					write_log("EmpresaModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresas SET participa_promociones=0 WHERE (id_empresa='$a')";
					$conexion->ejecutar($sql);
				}
		
				if($EmpresaModel['participa_promociones']==0){
					write_log("EmpresaModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE empresas SET participa_promociones=1 WHERE (id_empresa='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}


	if (!empty($_POST['operacion']) and $_POST['operacion']=="eliminar") {
		$EmpresaModel=new EmpresaModel('nombre_fantasia','cuit','telefono','direccion','usuario','password','numero_socio', 'celular', 'correo', 'rubro', 'responsable', 'socio', 'provincia', 'localidad', 'numero_terminal', 'numero_visa', 'numero_mastercard', 'numero_amex', 'numero_nativa');
		$resultado = $EmpresaModel->eliminar($_POST['id_empresa']);
		header("Location:../view/admin_panel_comerciante.php");

	}

	// $EmpresaModel=new EmpresaModel("a","dqd", 34234, 432424, 24242, "rwefwefef@gmail.com", "", "", "","", "", "", "visa", "","", "","", "", "user", 1234, "", "logo", 1);
	// $EmpresaModel->editar(1);
?>

		