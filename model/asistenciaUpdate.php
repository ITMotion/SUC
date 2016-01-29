<?php 
	$fecha = $_GET['fecha'];
	$matricula = $_GET['matricula'];
	$asistencia = $_GET['asistencia'];
	$materia = $_GET['materia'];

	require_once("DAOasistencia.php");
	$db = new DAOasistencia();
	$db->updateAsistencia($fecha, $matricula, $asistencia, $materia);
?>