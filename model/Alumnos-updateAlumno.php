<?php  
	$grupos = $_POST['grupos'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];

	
	include_once("DAOalum.php");
	$db = new DAOalum();
	$db->updateAlumno($nombres, $paterno, $materno, $grupos);
	header("Location: ../views/Alumnos.php?success");
?>