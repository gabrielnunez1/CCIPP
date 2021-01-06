<?php
include_once("../conexion/conexion.php");
	class RubroModel{
		protected $descripcion;
	
		function __construct ($descripcion){
			$this->descripcion=$descripcion;
			write_log("RubroModel","__construct ( $descripcion$)","La Clase RubroModel se creo correctamente.");
		}

		public function crear(){
			write_log("RubroModel","crear()","sin comentario");
			$conexion=new Conexion();
			$sql="INSERT INTO rubro(descripcion) VALUES ('$this->descripcion')";
			$conexion->ejecutar($sql);
		}

		public function listar(){
			write_log("RubroModel","listar()","sin comentario");
			$conexion=new Conexion();
			$sql="SELECT * FROM rubro";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		public function editar($id_rubro){
			write_log("RubroModel","editar()","sin comentario");
			$conexion=new Conexion();
			$sql="UPDATE rubro SET descripcion='$this->descripcion' WHERE (id_rubro='$id_rubro')";
			$conexion->ejecutar($sql);
		}

		public function buscar($descripcion){
			write_log("RubroModel","buscar()","sin comentario");
			$conexion = new Conexion(); //se crea el objeto controlador de la base de datos y se inserta el sql 
			$sql ="SELECT * FROM rubro WHERE (descripcion='$descripcion')";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		public function eliminar($id_rubro){
			write_log("RubroModel","eliminar($id_rubro)","sin comentario");
			$conexion=new Conexion();
			$sql="DELETE FROM rubro WHERE rubro.id_rubro = $id_rubro";
			$conexion->ejecutar($sql);
		}
	}
?>