<?php
include_once("../model/ProductoModel.php");
	class ProductoController {
		function __construct(){
			write_log("ProductoController","__construct ()","La Clase ProductoController se creo correctamente.");
		}
		public function listarLosProductosDeEstaSesion($id){
			write_log("ProductoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `productos` WHERE `usuario`=$id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		public function listarProducto($id){
			write_log("ProductoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `productos` WHERE `id_producto`=$id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}






		public function listar(){
			write_log("ProductoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `productos`";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		public function listarRubro($id){
			write_log("ProductoController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * FROM `productos` WHERE `rubro`= $id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
	}
	

	if(!empty($_POST["visible"])) {
		$a=$_POST["visible"];
		$conexion=new Conexion();
		$sql ="SELECT * FROM productos WHERE (id_producto='$a')";
		$resultado = $conexion->consultar($sql);
		if(isset($resultado)){                   
			while ($muestra = mysqli_fetch_array($resultado)) { 
				if($muestra['visible']==1){
					write_log("InformeModel",1,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE productos SET visible=0 WHERE (id_producto='$a')";
					$conexion->ejecutar($sql);
				}
		
				if($muestra['visible']==0){
					write_log("InformeModel",0,"sin comentario");
					$conexion=new Conexion();
					$sql ="UPDATE productos SET visible=1 WHERE (id_producto='$a')";
					$conexion->ejecutar($sql);
				}
			}
		}
	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="crear") {
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad_descuento=$_POST['cantidad_descuento'];
		$rubro=$_POST['rubro'];
		$usuario=$_POST['usuario'];
		$visible=$_POST['visible'];
		$dir_subida = '../img/';
		$fichero_subido = $dir_subida . basename($_FILES['imagen-1']['name']);
			if (move_uploaded_file($_FILES['imagen-1']['tmp_name'], $fichero_subido)) {
				rename($fichero_subido, "../img/".$usuario."-imagen-1".$_FILES['imagen-1']['size'].".png");
		}

            if (move_uploaded_file($_FILES['imagen-2']['tmp_name'], $fichero_subido)) {
                rename($fichero_subido, "../img/".$usuario."-imagen-2".$_FILES['imagen-2']['size'].".png");
        }
	
			if (move_uploaded_file($_FILES['imagen-3']['tmp_name'], $fichero_subido)) {
				rename($fichero_subido, "../img/".$usuario."-imagen-3".$_FILES['imagen-3']['size'].".png");
		}

			if (move_uploaded_file($_FILES['imagen-4']['tmp_name'], $fichero_subido)) {
				rename($fichero_subido, "../img/".$usuario."-imagen-4".$_FILES['imagen-4']['size'].".png");
		}

			if (move_uploaded_file($_FILES['imagen-5']['tmp_name'], $fichero_subido)) {
				rename($fichero_subido, "../img/".$usuario."-imagen-5".$_FILES['imagen-5']['size'].".png");
		}
        if (isset($_FILES['imagen-1']) and  $_FILES['imagen-1']['name']!="" ) {
            $datosimagen1 =$usuario."-imagen-1".$_FILES['imagen-1']['size'].".png";
		}else{
			$datosimagen1=null;
		}

        if (isset($_FILES['imagen-2']) and  $_FILES['imagen-2']['name']!="" ) {
			$datosimagen2 =$usuario."-imagen-2".$_FILES['imagen-2']['size'].".png";
        }else{
			$datosimagen2=null;
		}

        if (isset($_FILES['imagen-3']) and  $_FILES['imagen-3']['name']!="" ) {
            $datosimagen3 =$usuario."-imagen-3".$_FILES['imagen-3']['size'].".png";
		}else{
			$datosimagen3=null;
		}

        if (isset($_FILES['imagen-4']) and  $_FILES['imagen-4']['name']!="" ) {
            $datosimagen4 =$usuario."-imagen-4".$_FILES['imagen-4']['size'].".png";
        }else{
			$datosimagen4=null;
		}

        if (isset($_FILES['imagen-5']) and  $_FILES['imagen-5']['name']!="" ) {
            $datosimagen5 =$usuario."-imagen-5".$_FILES['imagen-5']['size'].".png";
        }else{
			$datosimagen5=null;
		}

		$ProductoModel=new ProductoModel($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $datosimagen1, $datosimagen2,$datosimagen3,$datosimagen4,$datosimagen5,$rubro, $usuario);
		$ProductoModel->crear();
		header("Location:../view/admin_panel_cargar_producto.php");

	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="editar") {
		$id_producto=$_POST['id_producto'];
		$nombre=$_POST['nombre'];
		$descripcion=$_POST['descripcion'];
		$precio=$_POST['precio'];
		$cantidad_descuento=$_POST['cantidad_descuento'];
		$rubro=$_POST['rubro'];
	
		$usuario=$_POST['usuario'];


		$dir_subida = '../img/';
		$fichero_subido = $dir_subida . basename($_FILES['imagen-1']['name']);
		if (move_uploaded_file($_FILES['imagen-1']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/".$usuario."-imagen-1".$_FILES['imagen-1']['size'].".png");
		}
	
		if (move_uploaded_file($_FILES['imagen-2']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/".$usuario."-imagen-2".$_FILES['imagen-2']['size'].".png");
		} 

		if (move_uploaded_file($_FILES['imagen-3']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/".$usuario."-imagen-3".$_FILES['imagen-3']['size'].".png");
		} 

		if (move_uploaded_file($_FILES['imagen-4']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/".$usuario."-imagen-4".$_FILES['imagen-4']['size'].".png");
		} 

		if (move_uploaded_file($_FILES['imagen-5']['tmp_name'], $fichero_subido)) {
			rename($fichero_subido, "../img/".$usuario."-imagen-5".$_FILES['imagen-5']['size'].".png");
		} 

        if (isset($_FILES['imagen-1']) and  $_FILES['imagen-1']['name']!="" ) {
            $datosimagen1 =$usuario."-imagen-1".$_FILES['imagen-1']['size'].".png";
		}else{
            if (isset($_POST['TEXT_ID_1']) and  $_POST['TEXT_ID_1']!="") {
                $datosimagen1 =($_POST['TEXT_ID_1']);
            }else{
                $datosimagen1=null;
            }
		}

        if (isset($_FILES['imagen-2']) and  $_FILES['imagen-2']['name']!="" ) {
			$datosimagen2 =$usuario."-imagen-2".$_FILES['imagen-2']['size'].".png";
		}else{
            if (isset($_POST['TEXT_ID_2']) and  $_POST['TEXT_ID_2']!="") {
                $datosimagen2 =($_POST['TEXT_ID_2']);
            }else{
                $datosimagen2=null;
            }
		}

        if (isset($_FILES['imagen-3']) and  $_FILES['imagen-3']['name']!="" ) {
            $datosimagen3 =$usuario."-imagen-3".$_FILES['imagen-3']['size'].".png";
		}else{
            if (isset($_POST['TEXT_ID_3']) and  $_POST['TEXT_ID_3']!="") {
                $datosimagen3 =($_POST['TEXT_ID_3']);
            }else{
                $datosimagen3=null;
            }
		}

        if (isset($_FILES['imagen-4']) and  $_FILES['imagen-4']['name']!="" ) {
            $datosimagen4 =$usuario."-imagen-4".$_FILES['imagen-4']['size'].".png";
		}else{
            if (isset($_POST['TEXT_ID_4']) and  $_POST['TEXT_ID_4']!="") {
                $datosimagen4 =($_POST['TEXT_ID_4']);
            }else{
                $datosimagen4=null;
            }
		}

        if (isset($_FILES['imagen-5']) and  $_FILES['imagen-5']['name']!="" ) {
            $datosimagen5 =$usuario."-imagen-5".$_FILES['imagen-5']['size'].".png";
		}else{
            if (isset($_POST['TEXT_ID_5']) and  $_POST['TEXT_ID_5']!="") {
                $datosimagen5 =($_POST['TEXT_ID_5']);
            }else{
                $datosimagen5=null;
            }
		}
		$visible=null;
		$ProductoModel=new ProductoModel($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $datosimagen1, $datosimagen2,$datosimagen3,$datosimagen4,$datosimagen5,$rubro, $usuario);
		$ProductoModel->editar($id_producto);
		header("Location:../view/admin_panel_cargar_producto.php#administrar-producto");
	}

	if (!empty($_POST['operacion']) and $_POST['operacion']=="eliminar") {
		echo $_POST['operacion'],$_POST['id_producto'];
		$ProductoModel=new ProductoModel('nombre','descripcion', 'precio', 'cantidad_descuento', 'visible','imagen-1','imagen-2','imagen-3','imagen-4','imagen-5','rubro','usuario');
		$resultado = $ProductoModel->eliminar($_POST['id_producto']);
		header("Location:../view/admin_panel_cargar_producto.php");
	}

 ?>