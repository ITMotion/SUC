<?php 
	header('Content-Type: text/html; charset=UTF-8');
	session_start();
	$profesor = $_SESSION['user'];
	$materia = $_POST['materia'];
	$grupo = $_POST['grupo'];
	$numUnidades = $_POST['unidades'];
	require_once("../DAOgm.php");
	$db = new DAOgm();
	if(!$db->compruebaFila($grupo, $materia, $profesor)) {
		$asignacion = $db->setRow($grupo, $materia, $profesor);
		if ($asignacion != 0) {
			if (isset($_POST['dias'])) {
				$dias = $_POST['dias'];
				$db->setDays($asignacion, $dias);
			}
			$db->setUnidades($asignacion, $numUnidades);
		}
	}
	header("Location: ../../views/Profesor/Asignaturas.php");
?>