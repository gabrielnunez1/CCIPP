<?php
	if(isset($_POST['usuario']) and isset($_POST['password'] )){
		if(isset($_POST['operacion']) and $_POST['operacion']=="admin"){
			include_once("../model/AdminModel.php");
			$admin_usuario= $_POST['usuario'];
			$admin_password= $_POST['password'];
			$AdminModel=new AdminModel('admin_usuario', 'admin_password');
			$result=$AdminModel->login($admin_usuario, $admin_password);
			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_array($result);
				session_start();
				$_SESSION['admin_usuario']=$row['admin_usuario'];
				$_SESSION['logged'] = TRUE;
				$_SESSION['tipo'] = "admin";
				$_SESSION['nombre_fantasia']=$row['admin_usuario'];
				write_log("LoginController"," ","el usuario administrador inicio secion");
				header('Location:../view/admin_panel.php');
				exit;
			}

			if(mysqli_num_rows($result)==false){
				header('Location:../admin.php');
				write_log("LoginController"," ","INTENTO FALLIDO DE INICIO DE SECION COMO ADMINISTRADOR");
			}
		}




















		if(isset($_POST['operacion']) and $_POST['operacion']=="empresa"){
			include_once("../model/EmpresaModel.php");
			$razon_social=null;
			$nombre_fantasia=null;
			$cuit=null;
			$telefono=null;
			$celular=null;
			$correo=null;
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
			$visible=null;
			$EmpresaModel=new EmpresaModel($razon_social,$nombre_fantasia, $cuit, $telefono, $celular, $correo, $rubro, $responsable, $socio, $provincia, $localidad, $numero_terminal, $numero_visa, $numero_mastercard, $numero_amex, $numero_nativa,$participa_promociones, $direccion, $usuario, $password, $numero_socio, $logo, $visible); 
			$result=$EmpresaModel->login($usuario, $password);
			if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_array($result);



				






				session_start();





				$razon_social=$row['razon_social'];
				$cuit=$row['cuit'];
				$rubro=$row['rubro'];
				$responsable=$row['responsable'];
				$direccion=$row['direccion'];
				$provincia=$row['provincia'];
				$localidad=$row['localidad'];
				$celular=$row['celular'];
				$logo=$row['logo'];
				$socio=$row['socio'];
				$numero_socio=$row['numero_socio'];
				$participa_promociones=$row['participa_promociones'];
				$numero_terminal=$row['numero_terminal'];
				$numero_visa=$row['numero_visa'];
				$numero_mastercard=$row['numero_mastercard'];
				$numero_amex=$row['numero_amex'];
				$numero_nativa=$row['numero_nativa'];
				$usuario=$row['usuario'];
				$password=$row['password'];          
				$visible=$row['visible'];











				if ($razon_social==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}                  
				if ($cuit==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($rubro==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($responsable==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($direccion==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($provincia==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($localidad==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($celular==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($logo==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}   
				if ($numero_terminal==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($numero_visa==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($numero_mastercard==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($numero_amex==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($numero_nativa==null) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				}
				if ($socio==1) {
					if ($numero_socio==null) {
						$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
					}  
				}
				if ($participa_promociones==0) {
					$contador_notificacion_pendiente=$contador_notificacion_pendiente+1;
				} 


















				$_SESSION['usuario']=$row['usuario'];
				$_SESSION['id_empresa']=$row['id_empresa'];
				$_SESSION['nombre_fantasia']=$row['nombre_fantasia'];
				$_SESSION['logged'] = TRUE;
				$_SESSION['tipo'] = "empresa";
				write_log("LoginController"," ","el Comercio inicio sesión");

				if ($contador_notificacion_pendiente!=0) {
					header('Location:../view/admin_panel_editar_comerciante.php');

				 }else{


					header('Location:../view/admin_panel_estadisticas.php');



				}





				
				exit;
			}
			if(mysqli_num_rows($result)==false){
				header('Location:../view/error.php');
				write_log("LoginController"," ","INTENTO FALLIDO DE INICIO DE SESIóN COMO Empresa");
			}
		}
	}



































	if(isset($_POST['operacion']) and $_POST['operacion']=="persona"){
		include_once("../model/PersonaModel.php");
		$persona_usuario= $_POST['usuario'];
		$persona_password= $_POST['password'];
		$PersonaModel=new PersonaModel('dni','nombre', 'apellido', 'fecha', 'provincia', 'localidad', 'direccion', 'telefono', 'correo', 'cuil', 'persona_usuario', 'persona_password');
		$result=$PersonaModel->login($persona_usuario, $persona_password);
		if(mysqli_num_rows($result)==1){
				$row=mysqli_fetch_array($result);
				session_start();
				$_SESSION['usuario']=$row['usuario'];
				$_SESSION['id_empresa']=$row['id_empresa'];
				$_SESSION['nombre_fantasia']=$row['nombre_fantasia'];
				$_SESSION['logged'] = TRUE;
				$_SESSION['tipo'] = "persona";
				write_log("LoginController"," ","el usuario inicio secion");
				header('Location:../view/admin_panel_comerciante.php');
			
				exit;
			}
		if(mysqli_num_rows($result)==false){
			header('Location:../view/error.php');
			write_log("LoginController"," ","INTENTO FALLIDO DE INICIO DE SECION COMO persona");
			}
		}
















	if (isset($_GET['operacion']) and $_GET['operacion']=='cerrar') {
		session_destroy(); 
    	header('Location:../view/chau.php');
	}
?>