<?php
include_once("../conexion/conexion.php");

	class EmpresaModel{
		protected $razon_social;
		protected $nombre_fantasia;
		protected $cuit;
		protected $telefono;
		protected $celular;
		protected $correo;
		protected $rubro;
		protected $responsable;
		protected $socio;
		protected $provincia;
		protected $localidad;
		protected $numero_terminal;
		protected $numero_visa;
		protected $numero_mastercard;
		protected $numero_amex;
		protected $numero_nativa;
		protected $participa_promociones;
		protected $direccion; 
		protected $usuario;
		protected $password;
		protected $numero_socio;
		protected $logo;
		protected $visible;

		function __construct ($razon_social,$nombre_fantasia, $cuit, $telefono, $celular, $correo, $rubro, $responsable, $socio, $provincia, $localidad, $numero_terminal, $numero_visa, $numero_mastercard, $numero_amex, $numero_nativa,$participa_promociones, $direccion, $usuario, $password, $numero_socio, $logo, $visible){
			$this->razon_social=$razon_social;
			$this->nombre_fantasia=$nombre_fantasia;
			$this->cuit=$cuit;
			$this->telefono=$telefono;
			$this->celular=$celular;
			$this->correo=$correo;
			$this->rubro=$rubro;
			$this->responsable=$responsable;
			$this->socio=$socio;
			$this->provincia=$provincia;
			$this->localidad=$localidad;
			$this->numero_terminal=$numero_terminal;
			$this->numero_visa=$numero_visa;
			$this->numero_mastercard=$numero_mastercard;
			$this->numero_amex=$numero_amex;
			$this->numero_nativa=$numero_nativa;
			$this->participa_promociones=$participa_promociones;
			$this->direccion=$direccion;
			$this->usuario=$usuario;
			$this->password=$password;
			$this->numero_socio=$numero_socio;
			$this->logo=$logo;
			$this->visible=$visible;
			write_log("EmpresaModel","__construct ($nombre_fantasia)","La Clase EmpresaModel se creo correctamente.");
		}

		public function crear(){
			write_log("persona","crear()","sin comentario");
			$conexion=new Conexion();
			$sql="INSERT INTO empresas(razon_social, nombre_fantasia, cuit, telefono, celular, correo, rubro, responsable, socio, provincia, localidad, numero_terminal, numero_visa, numero_mastercard, numero_amex, numero_nativa, participa_promociones, direccion, usuario, password, numero_socio, logo, visible) VALUES ('$this->razon_social','$this->nombre_fantasia','$this->cuit','$this->telefono','$this->celular','$this->correo','$this->rubro','$this->responsable','$this->socio','$this->provincia','$this->localidad','$this->numero_terminal','$this->numero_visa','$this->numero_mastercard','$this->numero_amex','$this->numero_nativa','$this->participa_promociones','$this->direccion','$this->usuario', '$this->password','$this->numero_socio','$this->logo','$this->visible')";
			$conexion->ejecutar($sql);
		}

		public function login($usuario, $password){
			write_log("EmpresaModel","login($usuario, $password)","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * from empresas WHERE (usuario='$usuario' AND password='$password')";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}




		public function cambiarVisibilidad($id_empresa){
			$conexion = new Conexion(); //se crea el objeto controlador de la base de datos y se inserta el sql 
			$sql ="SELECT * FROM empresas WHERE (id_empresa='$id_empresa')";
			$resultado = $conexion->consultar($sql);
			
		}




		public function listar(){
			write_log("EmpresaModel","listar()","sin comentario");
			$conexion=new Conexion();
			$sql="SELECT * FROM empresas";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		
		}

		public function editar($id_empresa){
			write_log("EmpresaModel","editar()","sin comentario");
			$conexion=new Conexion();
			#$sql="UPDATE empresas SET razon_social='$this->razon_social',nombre_fantasia='$this->nombre_fantasia',cuit='$this->cuit', telefono='$this->telefono', direccion='$this->direccion', usuario='$this->usuario', password='$this->password', numero_socio='$this->numero_socio', celular='$this->celular', correo='$this->correo', rubro='$this->rubro', responsable='$this->responsable', socio='$this->socio', provincia='$this->provincia', localidad='$this->localidad', numero_terminal='$this->numero_terminal', numero_visa='$this->numero_visa', numero_mastercard='$this->numero_mastercard', numero_amex='$this->numero_amex', numero_nativa='$this->numero_nativa', participa_promociones='$this->participa_promociones', logo='$this->logo' WHERE (id_empresa='$id_empresa')";
			$sql="UPDATE empresas SET razon_social='$this->razon_social',nombre_fantasia='$this->nombre_fantasia',cuit='$this->cuit',telefono='$this->telefono',celular='$this->celular',correo='$this->correo',rubro='$this->rubro',responsable='$this->responsable',socio='$this->socio',provincia='$this->provincia',localidad='$this->localidad',numero_terminal='$this->numero_terminal',numero_visa='$this->numero_visa',numero_mastercard='$this->numero_mastercard',numero_amex='$this->numero_amex',numero_nativa='$this->numero_nativa',participa_promociones='$this->participa_promociones',direccion='$this->direccion',usuario='$this->usuario',password='$this->password',numero_socio='$this->numero_socio',logo='$this->logo' WHERE id_empresa='$id_empresa'";
			$conexion->ejecutar($sql);
		}


		public function buscar( $participa_promociones, $cuit, $telefono, $direccion, $usuario, $password, $numero_socio, $celular, $correo, $rubro, $responsable, $socio, $provincia, $localidad, $numero_terminal, $numero_visa, $numero_mastercard, $numero_amex, $numero_nativa){
			write_log("EmpresaModel","buscar()","sin comentario");
			$conexion = new Conexion(); //se crea el objeto controlador de la base de datos y se inserta el sql 
			$sql ="SELECT * FROM empresas WHERE (id_empresa='$id_empresa',nombre_fantasia='$nombre_fantasia', cuit='$cuit', telefono='$telefono', direccion='$direccion', usuario='$usuario', password='$password', numero_socio='$numero_socio', celular='$celular, correo='$correo, rubro='$rubro', responsable='$responsable', socio='$socio', provincia='$provincia', localidad='$localidad', numero_terminal='$numero_terminal', numero_visa='$numero_visa', numero_mastercard='$numero_mastercard', numero_amex='$numero_amex', numero_nativa='$numero_nativa')";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		

		public function eliminar($id_empresa){
			write_log("EmpresaModel","eliminar($id_empresa)","sin comentario");
			$conexion=new Conexion();
			$sql="DELETE FROM empresas WHERE empresas.id_empresa = $id_empresa";
			$conexion->ejecutar($sql);
		}
	}
?>