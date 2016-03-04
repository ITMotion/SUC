<?php
	$materia = $_GET['materia'];
	$grupo = $_GET['grupo'];
	$asignatura = $_GET['asignatura'];
	require_once("../../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$unidades = $db->getUnidadesByMateria($asignatura);
	if(!is_null($unidades)) {
?>
<div class="form-group">
	<label for="unidad">Seleccione la unidad a consultar:</label>
	<select name="unidad" id="unidad" class="form-control">
		<?php
			foreach ($unidades as $unidad) {
				echo "<option value='$unidad->id'>Unidad: $unidad->descripcion</option>";
			}
		?>
	</select>
</div>
<button class="btn btn-success pull-right" onclick="getCalendar(<?php echo $materia ?>, '<?php echo $grupo; ?>', '<?php echo $asignatura ?>')">Consultar Lista de Asistencia</button>
<button class="btn btn-success" onclick="getEva(<?php echo $materia ?>, '<?php echo $grupo; ?>', '<?php echo $asignatura ?>')">Consultar EVA</button>
<?php
	}
	else {
?>
		<div class="alert alert-danger col-md-12">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			No existen unidades asignadas a esta materia.
		</div>
<?php
	}
?>
