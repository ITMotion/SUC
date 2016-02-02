<?php
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$tipo = $_POST['tipo'];
	$carrera = $_POST['carrera'];

	include_once("DAOprof.php");
	$db = new DAOprof();
	$db->insertProfesor($nombres, $paterno, $materno, $tipo, $carrera);
	header("Location: ../views/listadeprofesores.php?success"); 
?>