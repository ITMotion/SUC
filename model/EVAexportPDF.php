<?php 
	require_once("dompdf_config.inc.php");
	require_once("../model/DAOeva.php");
	$db = new DAOeva();
	$asignatura = 1;
	$unidad = 1;

	$infoAsignatura = $db->getInfoAsignatura($asignatura);
	$pdf = '

<div class="container">
	<h3 class="col-md-12"><b>Carrera:</b> <?php echo $infoAsignatura[0]->carrera; ?></h3>
	<h3 class="col-md-3"><b>Grupo:</b> <?php echo $infoAsignatura[0]->grupo; ?></h3>
	<h3 class="col-md-3"><b>Materia:</b> <?php echo $infoAsignatura[0]->materia ?></h3>
	<h3 class="col-md-3"><b>Turno:</b> <?php echo $infoAsignatura[0]->horario ?></h3>
	<h3 class="col-md-3"><b>Grado:</b> <?php echo $infoAsignatura[0]->grado ?></h3>
</div>
';
echo $pdf; 
?>