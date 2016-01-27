<?php  
	$carrera = $_GET["carrera"];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$grupos = $db->getGruposByCarrera($carrera);
	if(!is_null($grupos)) {
?>
<div class="form-group">
	<select name="grupo" id="grupo" class="form-control" onchange="getMateriasByGrupo(value)">
		<option value="">Seleccione un grupo</option>
		<?php 
			foreach ($grupos as $row) {
				echo "<option>$row->grupo</option>";
			}
		?>
	</select>
</div>
<?php 
	}
	else {
?>
	<div class="alert alert-danger col-md-12">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen grupos asignados a esta carrera. 
	</div>
<?php
	}
?>