<?php
	class Conexion{
		function __construct(){
   			try{
				$host="localhost";
				$db_name="u560125893_siste";
				$user="root";
				$pass="root";
					$this->con = mysqli_connect($host, $user, $pass);
					write_log("Conexion","__construct()","La clase conexion se creo correctamente");
	   	    		mysqli_select_db($this->con, $db_name) or die ("No se ha encontrado la base de datos");
   			}catch(Exception $ex){
   				throw $ex;
   			}
   		}
   		function consultar($sql){
			write_log("Conexion","consultar($sql)","sin comentario");
   			$dato = mysqli_query($this->con, $sql);
   			return $dato;
   		}
   		function ejecutar($sql){
			write_log("Conexion","ejecutar($sql)","sin comentario");
   			mysqli_query($this->con, $sql);
   		}
		function runQuery($query) {
			write_log("Conexion","runQuery($query)","sin comentario");
			$result = mysql_query($query);
			while($row=mysql_fetch_assoc($result)) {
				$resultset[] = $row;
			}
			if(!empty($resultset))
				return $resultset;
			}
		function numRows($query) {
			write_log("Conexion","numRows($query)","sin comentario");
			$result  = mysql_query($query);
			$rowcount = mysql_num_rows($result);
			return $rowcount;
		}
	}
	function write_log($clase,$funcion, $comentario) {
		$arch = fopen($_SERVER['DOCUMENT_ROOT']."/CCIP/conexion/debug.html", "a+"); 
		fwrite($arch, $clase."-->".$funcion." ".$comentario."<br>");
		fclose($arch);
	}
?>