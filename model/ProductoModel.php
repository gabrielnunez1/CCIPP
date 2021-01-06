<?php
include_once("../conexion/conexion.php");

	class ProductoModel{
		protected $nombre;
		protected $descripcion;
		protected $precio;
		protected $visible;
		protected $cantidad_descuento; 
		protected $imagen1;
		protected $imagen2;
		protected $imagen3;
		protected $imagen4;
		protected $imagen5;
		protected $rubro;
		protected $usuario;
		
		function __construct ($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $imagen1, $imagen2,$imagen3,$imagen4,$imagen5,$rubro, $usuario){
			$this->nombre=$nombre;
			$this->descripcion=$descripcion;
			$this->precio=$precio;
			$this->visible=$visible;
			$this->cantidad_descuento=$cantidad_descuento;
			$this->imagen1=$imagen1;
			$this->imagen2=$imagen2;
			$this->imagen3=$imagen3;
			$this->imagen4=$imagen4;
			$this->imagen5=$imagen5;
			$this->rubro=$rubro;
			$this->usuario=$usuario;
			write_log("ProductoModel","__construct ($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $imagen1, $imagen2,$imagen3,$imagen4,$imagen5,$rubro, $usuario)","La Clase ProductoModel se creo correctamente.");
		}

		//crea una Producto con los datos de la instancia en la base de datos 
		public function crear(){
			write_log("ProductoModel","crear()","sin comentario");
			$conexion=new Conexion();
			$sql="INSERT INTO productos (`nombre`, `descripcion`, `precio`, `visible`, `cantidad_descuento`, `imagen`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `rubro`, `usuario`) VALUES ('$this->nombre', '$this->descripcion', '$this->precio', '$this->visible', '$this->cantidad_descuento', '$this->imagen1', '$this->imagen2', '$this->imagen3', '$this->imagen4', '$this->imagen5', '$this->rubro', '$this->usuario')";
			$conexion->ejecutar($sql);
		}

		public function listar(){
			write_log("ProductoModel","listar()","sin comentario");
			$conexion=new Conexion();
			$sql="SELECT * FROM productos";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		
		}

		//actualiza una producto existente en la base de datos 
		public function editar($id_producto){
			write_log("ProductoModel","editar()","sin comentario");
			$conexion=new Conexion();
			$sql="UPDATE productos SET descripcion='$this->descripcion', nombre='$this->nombre', precio='$this->precio', cantidad_descuento='$this->cantidad_descuento',  imagen='$this->imagen1', imagen2='$this->imagen2', imagen3='$this->imagen3', imagen4='$this->imagen4', imagen5='$this->imagen5', rubro='$this->rubro'  WHERE (id_producto='$id_producto')";
			$conexion->ejecutar($sql);
		}

		//buscar a una producto 
		public function buscar(){
			write_log("ProductoModel","buscar()","sin comentario");
			$conexion = new Conexion(); //se crea el objeto controlador de la base de datos y se inserta el sql 
			$sql ="SELECT * FROM productos WHERE (descripcion='$this->descripcion', nombre='$this->nombre', precio='$this->precio', cantidad_descuento='$this->cantidad_descuento', estado='$this->estado', imagen='$this->imagen')";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		public function login($admin_usuario, $admin_password){
			write_log("ProductoModel","login($admin_usuario, $admin_password)","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * from admin WHERE (admin_usuario='$admin_usuario' AND admin_password='$admin_password')";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		
		public function eliminar($id_producto){
			write_log("ProductoModel","eliminar($id_producto)","sin comentario");
			$conexion=new Conexion();
			$sql="DELETE FROM productos WHERE productos.id_producto = $id_producto";
			$conexion->ejecutar($sql);
		}

		public function cambiarVisibilidad($id_producto){
			$conexion = new Conexion(); //se crea el objeto controlador de la base de datos y se inserta el sql 
			$sql ="SELECT * FROM productos WHERE (id_producto='$id_producto')";
			$resultado = $conexion->consultar($sql);
			
		}


	}

	// $ProductoModel=new ProductoModel($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $imagen, $imagen2,$imagen3,$imagen4,$imagen5,$rubro, $usuario);
	// $ProductoModel->editar(1);

	// $ProductoModel=new ProductoModel($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $imagen, $imagen2,$imagen3,$imagen4,$imagen5,$rubro, $usuario");
	// $ProductoModel->crear()

	// $ProductoModel=new ProductoModel($nombre, $descripcion,  $precio, $visible, $cantidad_descuento, $imagen, $imagen2,$imagen3,$imagen4,$imagen5,$rubro, $usuario);
	// $ProductoModel->eliminar(3);

?>