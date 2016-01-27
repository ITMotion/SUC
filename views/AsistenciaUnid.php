<?php  
	$materia = $_GET['materia'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$unidades = $db->getUnidadesByMateria($materia);
	if(!is_null($unidades)) {
?>
<div class="form-group">
	<select name="unidad" id="unidad" class="form-control">
		<?php  
			foreach ($unidades as $unidad) {
				echo "<option value='$unidad->id'>Unidad: $unidad->descripcion</option>";
			}
		?>
	</select>
</div>
<button class="btn btn-success" onclick="getCalendar()">Consultar</button>
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