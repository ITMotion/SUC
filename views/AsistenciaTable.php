<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$assignment = $db->getAssignmentByGrupoAndMateria($grupo, $materia);
?>
<h3>Profesor: <?php echo $assignment[0]->paterno . " " . $assignment[0]->materno . " " . $assignment[0]->nombres;?></h3>
