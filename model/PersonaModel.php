<?php
include_once("../conexion/conexion.php");
/**
	*Alejandro Avellaneda
	* hay que hacer andar  la funcion buscar
*/
	class PersonaModel{
		protected $dni;
		protected $nombre;
		protected $apellido;
		protected $fecha; //fecha de nacimiento de la persona
		protected $direccion;
		protected $telefono;
		protected $correo;
		protected $cuil; //opcional
		protected $persona_usuario;
		protected $persona_password;

		function __construct ( $dni, $nombre, $apellido, $fecha,  $direccion, $telefono, $correo, $cuil, $persona_usuario, $persona_password){
			$this->dni=$dni;
			$this->nombre=$nombre;
			$this->apellido=$apellido;
			$this->fecha=$fecha;
			$this->direccion=$direccion;
			$this->telefono=$telefono;
			$this->correo=$correo;
			$this->cuil=$cuil;
			$this->persona_usuario=$persona_usuario;
			$this->persona_password=$persona_password;
			write_log("PersonaModel","__construct ( $dni, $nombre, $apellido, $fecha, $direccion, $telefono, $correo, $cuil, $persona_usuario, $persona_password)","La Clase PersonaModel se creo correctamente.");
		}

		
		//crea una persona con los datos de la instancia en la base de datos 
		public function crear(){
			write_log("persona","crear()","sin comentario");
			$conexion=new Conexion();
			$sql="INSERT INTO personas (dni, nombre, apellido, fecha, direccion, telefono, correo, cuil, persona_usuario, persona_password  ) VALUES ('$this->dni', '$this->nombre', '$this->apellido', '$this->fecha',  '$this->direccion', '$this->telefono', '$this->correo', '$this->cuil', '$this->persona_usuario', '$this->persona_password')";
			//INSERT INTO `personas`(`dni`, `nombre`, `apellido`, `fecha`, `provincia`, `localidad`, `direccion`, `telefono`, `correo`, `cuil`) VALUES (40108413,'alejandro','avellaneda','1996-12-05',1,1,'chacra 147 8',543764631054,'aleavellaneda1gmail.com',20401084135)
			$conexion->ejecutar($sql);
		}

		public function listar(){
			write_log("PersonaModel","listar()","sin comentario");
			$conexion=new Conexion();
			$sql="SELECT personas.id as 'personas_id', dni, nombre, apellido, fecha, direccion, telefono, correo, cuil , persona_usuario, persona_password FROM personas";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		
		}

		//actualiza una persona existente en la base de datos 
		public function editar($persona_id){
			write_log("PersonaModel","editar()","sin comentario");
			$conexion=new Conexion();
			$sql="UPDATE personas SET dni='$this->dni', nombre='$this->nombre', apellido='$this->apellido', fecha='$this->fecha', direccion='$this->direccion', telefono='$this->telefono', correo='$this->correo',  cuil='$this->cuil',  persona_usuario='$this->persona_usuario',  persona_password='$this->persona_password'  WHERE (id='$persona_id')";
			$conexion->ejecutar($sql);
		}

		//buscar a una persona 
		public function buscar(){
			write_log("PersonaModel","buscar()","sin comentario");
			$conexion = new Conexion(); //se crea el objeto controlador de la base de datos y se inserta el sql 
			$sql ="SELECT * FROM personas WHERE (dni='$this->dni')";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}

		public function login($persona_usuario, $persona_password){
			write_log("PersonaModel","login($persona_usuario, $persona_password)","sin comentario");
			$conexion=new Conexion();
			$sql ="SELECT * from personas WHERE persona_usuario='$persona_usuario' AND persona_password='$persona_password'";
			$resultado = $conexion->consultar($sql);
			return $resultado;
		}
		public function eliminar($persona_id){
			write_log("PersonaModel","eliminar($persona_id)","sin comentario");
			$conexion=new Conexion();
			$sql="DELETE FROM personas WHERE personas.id = $persona_id";
			$conexion->ejecutar($sql);
		}
	}	
	// $PersonaModel=new PersonaModel(1, "ee", "apellido", "2018-10-02", "dsfsdfer 444", 435435, "correor@wrwerwe.com", 43223423, "gabi", 1234);
	// $PersonaModel->crear()
		
	// $PersonaModel=new PersonaModel(122, "ee", "apellido", "2018-10-02", "dsfsdfer 444", 435435, "correor@wrwerwe.com", 43223423, "gabi", 1234);
	// $PersonaModel->editar(3);

	// $PersonaModel=new PersonaModel("343432", "ee", "apellido", "2018-10-02", "dsfsdfer 444", 435435, "correor@wrwerwe.com", "43223423", "gabi", "1234");
	// $PersonaModel->eliminar(2);

?>


