<?php
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	$asignatura = $_GET['asignatura'];
	include_once("../../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$assignment = $db->getAsignaturaByGrupoAndMateriaAndUnidad($grupo, $materia, $unidad);
	$alumnos = $db->getAlumnosByGrupo($grupo);
	if (!is_null($assignment)) {
?>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nombre</th>
				<?php
					foreach ($assignment as $column) {
						echo "<th>$column->fecha</th>";
					}
				?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($alumnos as $alumno): ?>
			<tr>
				<th><?php echo $alumno->matricula; ?></th>
				<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres) ?></th>
				<?php
					foreach ($assignment as $column):
						$asistencia = $db->getAsistencia($alumno->matricula, $asignatura, $column->fecha);
						if ($asistencia != 0) {
							if($asistencia[0]->asistencia == 1){
				?>
					<th><input type="checkbox" checked
					onclick="updateAsistencia(0, <?php echo $alumno->matricula ?>, '<?php echo $column->fecha ?>', '<?php echo $asignatura ?>')"></th>
				<?php
							}
							else {
				?>
					<th><input type="checkbox"
					onclick="updateAsistencia(1, <?php echo $alumno->matricula ?>, '<?php echo $column->fecha ?>', '<?php echo $asignatura ?>')"></th>
				<?php 		}
						} else {
				?>
					<th><input type="checkbox"
					onclick="updateAsistencia(1, <?php echo $alumno->matricula ?>, '<?php echo $column->fecha ?>', '<?php echo $asignatura ?>')"></th>
				<?php } endforeach ?>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php }
	else {
		$grado = $db->getGradoMateria($materia);
		$fechas = $db->getFechasCuatrimestre($grado[0]->grado);
		if (is_null($fechas)) {
			echo "<h1>¡El cuatrimestre no es válido!</h1>";
		} else {
?>
	<a class="btn btn-primary col-md-12" data-toggle="modal" href='#modal-id'>Configurar Fechas Válidas Para la Unidad</a>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					<form>
						<label for="FI">Fecha Inicio:</label>
						<input type="date" name="FI" min="<?php echo $fechas[0]->fecha_inicio ?>" max="<?php echo $fechas[0]->fecha_fin ?>" required>
						<label for="FF" class="col-md-offset-1">Fecha Final:</label>
						<input type="date" name="FF" min="<?php echo $fechas[0]->fecha_inicio ?>" max="<?php echo $fechas[0]->fecha_fin ?>" required>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}
?>
