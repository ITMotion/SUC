<?php 
/**********************************************************
* @description: Actualiza la información de un alumno en la base de datos desde la aplicación Android
* @author: Gustavo Valderrama
* @email: gustavoavalderrama@gmail.com
***********************************************************/

require_once("../../model/DAOalum.php");
$db = new DAOalum();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//recibe el cuerpo de la petición POST, y se convierte a JSON
	$alumno = json_decode(file_get_contents("php://input"), true);
	
	//actualiza la información del alumno en la base de datos y se regresa un valor que nos dirá si se tuvo exito o no
	$status = $db->updateAlumno($alumno['nombres'], $alumno['paterno'], $alumno['materno'], $alumno['grupo']);

	if($status) {
		//si tuvo exito regresa un status de 1 y un mensaje de éxito
		print json_encode(
			array(
				'status' => "1",
				'mensaje' => "¡Alumno actualizado correctamente!"
			)
		);
	} else {
		// de lo contrario, el status será 2 y regresa un mensaje de error
		print json_encode(
			array(
				'status' => "2",
				'mensaje' => "¡Ha ocurrido un error, lo sentimos!"
			)
		);
	}
}
?>