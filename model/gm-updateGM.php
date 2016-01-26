<?php  
	$id = $_POST["id"];
	$profesor = $_POST['profesor'];
	$dias = $_POST['dias'];
	$materia = $_POST['materia'];

	include_once("DAOgm.php");
	$db = new DAOgm();
	$materiaexistente = $db->compruebaFila($grupo, $materia, $profesor);
	$db->updateGM($id, $profesor);
	$db->deleteDays($id);
	$db->setDays($id, $dias);
	header("Location: ../views/gruposmaterias.php?success");
?>