<?php
	include_once("../conexion/conexion.php");
	Class AdminModel {
		protected $admin_usuario;
		protected $admin_password;
		function __construct ($admin_usuario, $admin_password){
			$this->admin_usuario=$admin_usuario;
			$this->admin_password=$admin_password;
			write_log("AdminModel","__construct ($admin_usuario, $admin_password)","La clase AdminModel se creo correctamente");
		}
		public function crear(){
			write_log("InformeModel","crear()","sin comentario");
			$conexion=new Conexion();
			$sql="INSERT INTO admin($admin_usuario, $admin_password) VALUES ('$this->admin_usuario', '$this->admin_password')";
			$conexion->ejecutar($sql);
		}
		public function editar($admin_id){
			write_log("EmpresaModel","editar()","sin comentario");
			$conexion=new Conexion();
			$sql="UPDATE admin SET admin_usuario='$this->admin_usuario', admin_password='$this->admin_password' WHERE (admin_id='$admin_id')";
			$conexion->ejecutar($sql);
		}
		public function login($admin_usuario, $admin_password){
			write_log("AdminModel","login($admin_usuario, $admin_password)","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * from admin WHERE admin_usuario='$admin_usuario' AND admin_password='$admin_password'";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
	}
?>