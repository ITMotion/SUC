<?php
	$grupo = $_GET['grupo'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$materias = $db->getMateriasByGrupo($grupo);
	if(!is_null($materias)) {
?>
<div class="form-group">
	<select name="materia" id="materia" onchange="getUnidadesByMateria(value)" class="form-control">
		<option value="">Seleccione una materia</option>
		<?php
			foreach ($materias as $materia) {
				echo "<option value='$materia->clave'>$materia->descripcion</option>";
			}
		?>
	</select>
</div>
<?php  
	} else {
?>
	<div class="alert alert-danger col-md-12">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen materias asignadas a este grupo. 
	</div>
<?php
	}
?>