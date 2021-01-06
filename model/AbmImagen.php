<?php

class AbmImagen
{

	private $Conexion;

	function __construct($Conexion)
	{
		$this->Conexion = $Conexion;
	}

	/**********************************
	Función para guardar la ruta de la
	   Imagen en la base de datos
	**********************************/
	public function uploadImage($imagen)
	{
		$ruta = '../imagenes/'.$imagen['imagen']['name'];
		move_uploaded_file($imagen['imagen']['tmp_name'],$ruta);
		$SQLStatement = $this->Conexion->prepare("INSERT INTO productos (imagen) VALUES (:url)");
		$SQLStatement->bindParam(":url",$ruta);
		$SQLStatement->execute();
	}

	/**********************************
	Función visualizar las imagenes 
	que estan en la ruta guardada en la 
	BD
	**********************************/
	public function viewImages()
	{
		$SQLStatement = $this->Conexion->prepare("SELECT `id_producto`, `imagen` FROM `productos`");
		$SQLStatement->execute();

		while($img = $SQLStatement->fetch(PDO::FETCH_ASSOC))
		{
		?>
		<tr>
			<td><img src="<?php print($img['imagen']); ?>" width="200"></td>
		</tr>
		<?php 
		}
	}
 	public function eliminarImagen()
{
	$SQLStatement = $this->Conexion->prepare("DELETE imagen FROM productos WHERE id_producto=$id_producto");
	$SQLStatement->execute();

}


}

?>