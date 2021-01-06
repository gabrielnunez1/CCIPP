<?php
include_once("../conexion/conexion.php");
/**
	*Alejandro Avellaneda
	* hay que hacer andar  la funcion buscar
*/
	class EventoModel{
		protected $descripcion;
		protected $nombre;
		protected $logo;
		protected $visible; 
		

		function __construct ($descripcion, $nombre, $logo, $visible){
			$this->descripcion=$descripcion;
			$this->nombre=$nombre;
			$this->logo=$logo;
			$this->visible=$visible;
			
			
			write_log("EventoModel","__construct ( $descripcion, $nombre, $logo, $visible)","La Clase EventoModel se creo correctamente.");
		}

		//crea un evento con los datos de la instancia en la base de datos 
		public function crear(){
			write_log("EventoModel","crear()","sin comentario");
			$conexion=new Conexion();
			$sql="INSERT INTO eventos (descripcion,nombre,logo,visible) VALUES ('$this->descripcion', '$this->nombre', '$this->logo', '$this->visible')";
			$conexion->ejecutar($sql);
		}

		public function listar(){
			write_log("EventoModel","listar()","sin comentario");
			$conexion=new Conexion();
			$sql="SELECT * FROM eventos";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		
		}

		public function eliminar($id_evento){
			write_log("EventoModel","eliminar($id_evento)","sin comentario");
			$conexion=new Conexion();
			$sql="DELETE FROM eventos WHERE eventos.id_evento = $id_evento";
			$conexion->ejecutar($sql);
		}
	}
?>