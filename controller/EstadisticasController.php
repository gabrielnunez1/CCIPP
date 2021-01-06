<?php
	include_once("../conexion/conexion.php");
class EstadisticasController {
		function __construct(){
			write_log("RubroController","__construct ()","La Clase RubroController se creo correctamente.");
		}

		public function ComerciosCargados(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(*) as ComerciosCargados FROM empresas";
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }	
        
        
        public function ComerciosHabilitados(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(visible) as ComerciosHabilitados FROM empresas WHERE visible= 1";
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }	

        public function ComerciosInhabilitados(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(visible) as ComerciosInhabilitados FROM empresas WHERE visible=0";
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }



        public function ArticulosTotales(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(*) as ArticulosTotales FROM productos";
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }	
        
        
        public function ArticulosInhabilitados(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(visible) as ArticulosInhabilitados FROM productos WHERE visible= 1";
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }	

        public function ArticulosHabilitados(){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(visible) as ArticulosHabilitados FROM productos WHERE visible=0";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		

		public function ArticulosTotalesEmpresas($id){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(*) as ArticulosTotales FROM productos where usuario=$id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }	
        
        
        public function ArticulosInhabilitadosEmpresas($id){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(visible) as ArticulosInhabilitados FROM productos WHERE visible= 0 and usuario=$id" ;
			$resultado = $conexion->consultar($sql);
			return $resultado;
        }	

        public function ArticulosHabilitadosEmpresas($id){
			write_log("RubroController","listar()","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT count(visible) as ArticulosHabilitados FROM productos WHERE visible=1 and usuario=$id";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		

	}
?>