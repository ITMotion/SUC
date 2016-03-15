<?php 
/**********************************************************
* @description: Elimina un alumno de la base de datos desde la app Android
* @author: Gustavo Valderrama
* @email: gustavoavalderrama@gmail.com
***********************************************************/

require_once("../../model/DAOalum.php");
$db = new DAOalum();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	//recibe el cuerpo de la petición POST, y se convierte a JSON
	$alumno = json_decode(file_get_contents("php://input"), true);

	//intenta eliminar al alumno de la base de datos mediante su matrícula. La variable status se usa para comprobar el éxito.
	$status = $db->deleteAlumno($alumno['matricula']);

	if($status) {
		//si tuvo exito regresa un status de 1 y un mensaje de éxito
		print json_encode(
			array(
				'status' => "1",
				'mensaje' => "¡Alumno eliminado exitosamente!"
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