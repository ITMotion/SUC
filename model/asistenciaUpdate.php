<?php 
	$fecha = $_GET['fecha'];
	$matricula = $_GET['matricula'];
	$asistencia = $_GET['asistencia'];
	$materia = $_GET['materia'];

	require_once("../model/class.school.php");
	$db = new School();
	$db->setList($fecha, $matricula, $asistencia, $materia);
?>