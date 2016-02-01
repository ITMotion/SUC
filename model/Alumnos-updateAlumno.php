<?php  
	$matricula = $_POST['matricula'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$grupo = $_POST['grupo'];

	
	include_once("DAOalum.php");
	$db = new DAOalum();
	$db->updateAlumno($nombres, $paterno, $materno, $grupo, $matricula);
	header("Location: ../views/Alumnos.php?success");
?>