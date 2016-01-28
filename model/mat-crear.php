<?php  
	include_once("DAOmaterias.php");
	$db = new DAOmaterias();
	$descripcion = $_POST['descripcion'];
	$grado = $_POST['grado'];
	$carrera = $_POST['carrera'];
	$db->crearMateria($descripcion, $grado, $carrera);
	header("Location: ../views/Materias.php?success");
?>