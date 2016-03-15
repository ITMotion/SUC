<?php  
//se obtiene la asignatura por método POST desde solicitud AJAX
	$id = $_POST['assignment'];
//Se crea una instancia de la base de datos	
	require_once("../DAOgm.php");
	$db = new DAOgm();

//se intenta eliminar la asignatura en la base de datos
	$status = $db->deleteGM($id);

//si la operación es exitosa se devuelve un status 1, de lo contrario el status será 2	
	if ($status) {
		$data['status'] = "1";
	} else {
		$data['status'] = "0";
	}

//se codifican los datos en formato json
	print json_encode($data);
?>