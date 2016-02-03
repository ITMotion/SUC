<?php  
	$materia = $_GET['materia'];
	$grupo = $_GET['grupo'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$unidades = $db->getUnidadesByMateria($materia);
	if(!is_null($unidades)) {
?>
<div class="form-group">
	<label for="unidad">Seleccione la unidad a consultar:</label>
	<select name="unidad" id="unidad" class="form-control">
		<?php  
			foreach ($unidades as $unidad) {
				echo "<option value='$unidad->descripcion'>Unidad: $unidad->descripcion</option>";
			}
		?>
	</select>
</div>
<button class="btn btn-success pull-right" onclick="getCalendar(<?php echo $materia ?>, '<?php echo $grupo; ?>')">Consultar Lista de Asistencia</button>
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