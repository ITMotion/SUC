<?php 
	require_once("DAOeva.php");
	$bdCalif = new DAOeva();	

	$materia = $_POST['materia'];
	$unidad = $_POST["unidad"];
	$saber = $_POST["saber"];
	$hacer = $_POST["hacer"];
	$ser = $_POST["ser"];
	$asistencia = $_POST["asistencia"];
	$alumno = $_POST["alumno"];
	$total = $_POST["total"];

	$bdCalif->insertCalif($materia, $unidad, $alumno, $saber, $hacer, $ser, $asistencia, $total);
	echo $materia . " " . $unidad . " " . $saber . " " . $hacer . " " . $ser . " ". $asistencia . " " . $alumno . " " . $total;
?>
