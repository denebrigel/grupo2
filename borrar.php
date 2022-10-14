<?php

/*llamado a la base de datos */

include('conexion.php');
include("funciones.php");

/*Mediante el Metodo POST se identifica el Id del usuario      */

if(isset($_POST["id_usuario"]))
{
	$imagen = obtener_nombre_imagen($_POST["id_usuario"]);
	if($imagen != '')
	{
		unlink("img/" . $imagen);
	}
	/*Despues de identificado el usuario por su id se procede a eliminar de la base de datos     */
	$stmt = $conexion->prepare(
		"DELETE FROM usuarios WHERE id = :id"
	);
	$resultado = $stmt->execute(
		array(
			':id'	=>	$_POST["id_usuario"]
		)
	);
	/*se muestra mensaje que el usuario ha sido borrado    */
	if(!empty($resultado))
	{
		echo 'Registro borrado';
	}
}



?>