<?php 
	session_start();
	$profesor = $_SESSION['user'];
	$materia = $_POST['materia'];
	$grupo = $_POST['grupo'];
	$numUnidades = $_POST['unidades'];
	$dias = $_POST['dias'];

	require_once("../DAOgm.php");
	$db = new DAOgm();
	if(!$db->compruebaFila($grupo, $materia, $profesor)) {
		$asignacion = $db->setRow($grupo, $materia, $profesor);
		if ($asignacion != 0) {
			$db->setDays($asignacion, $dias);
		}
	}
?>