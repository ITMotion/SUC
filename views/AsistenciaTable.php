<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$assignment = $db->getAssignmentByGrupoAndMateria($grupo, $materia);
	$daysassignment = $db->getDaysByGrupoAndMateria($grupo, $materia);
	
?>
<h3>Profesor: <?php echo $assignment[0]->paterno . " " . $assignment[0]->materno . " " . $assignment[0]->nombres;?></h3>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nombre</th>
				<?php foreach ($daysassignment as $column) {
					echo "<th>$column->dia; </th>";
				} ?>
			</tr>
		</thead>
	</table>
</div>

