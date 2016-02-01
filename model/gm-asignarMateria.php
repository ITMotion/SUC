<?php  
	$grupo = $_POST['grupos'];
	$materia = $_POST['materia'];
	$profesor = $_POST['profesor'];
	$dias = $_POST['dias'];

	include_once("DAOgm.php");
	$db = new DAOgm();
	if(!$db->compruebaFila($grupo, $materia, $profesor)) {
		$db->setRow($grupo, $materia, $profesor);
		$asignacion = $db->getLastRowInserted();
		$db->setDays($asignacion[0]->id, $dias);
		header("Location: ../views/GruposMaterias.php?success");
	} else {
		header("Location: ../views/GruposMateriasFrm.php?success=2");
	}
?>