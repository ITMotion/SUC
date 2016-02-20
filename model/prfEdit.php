<?php 
	require_once("DAOprofesores.php");
	$dbProfesores = new DAOprofesores();

	$matricula = $_POST['matricula'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$correo = $_POST['correo'];
	$tipo = $_POST['tipo'];

	$dbProfesores->editProfesor($matricula, $nombres, $paterno, $materno, $correo, $tipo);
	header("Location: ../views/Profesores.php?success");
?>