<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$assignment = $db->getAsignaturaByGrupoAndMateriaAndUnidad($grupo, $materia, $unidad);
	$profesor = $db->getProfesorByGrupoAndMateria($grupo, $materia);
	$alumnos = $db->getAlumnosByGrupo($grupo);
	//$asistencia = $db->obtenerAsistenciaPorGrupoYMateriaYUnidad($grupo, $materia, $unidad);
?>
<h3><b>Profesor:</b> <?php echo $profesor[0]->paterno . " " . $profesor[0]->materno . " " . $profesor[0]->nombres;?></h3>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nombre</th>
				<?php foreach ($assignment as $column) {
					echo "<th>$column->fecha</th>";
				} ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($alumnos as $alumno): ?>
			<tr>
				<th><?php echo $alumno->matricula; ?></th>
				<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres) ?></th>
				<?php 
					foreach ($assignment as $column): 
						$asistencia = $db->getAsistencia($alumno->matricula, $materia, $column->fecha);
						if ($asistencia != 0) {
							if($asistencia[0]->asistencia == 1){
				?>
					<th><input type="checkbox" checked 
					onclick="updateAsistencia(0, <?php echo $alumno->matricula ?>, '<?php echo $column->fecha ?>', '<?php echo $materia ?>')"></th>
				<?php
							}
							else {
				?>
					<th><input type="checkbox"
					onclick="updateAsistencia(1, <?php echo $alumno->matricula ?>, '<?php echo $column->fecha ?>', '<?php echo $materia ?>')"></th>
				<?php 		} 
						} else {
				?>
					<th><input type="checkbox"
					onclick="updateAsistencia(1, <?php echo $alumno->matricula ?>, '<?php echo $column->fecha ?>', '<?php echo $materia ?>')"></th>	
				<?php } endforeach ?>
			</tr>		
			<?php endforeach ?>
		</tbody>
	</table>
</div>
