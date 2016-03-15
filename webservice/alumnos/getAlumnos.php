<?php  
/**********************************************************
* @description: Obtiene todos los alumnos de la base de datos para la aplicación Android
* @author: Gustavo Valderrama
* @email: gustavoavalderrama@gmail.com
***********************************************************/
require_once("../../model/DAOalum.php");
$db = new DAOalum();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$alumnos = $db->getInfoAlumnos();
	if (!is_null($alumnos)) {
		$datos['status'] = 1;
		$datos['alumnos'] = $alumnos;
		print json_encode($datos);
	} else { //si algo sale mal, entonces el status será 2 y regresaremos un mensaje de error
		print json_encode(array("estado" => 2, "mensaje" => "Ha ocurrido un error"));
	} 
}
?>