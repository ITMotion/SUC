<?php
	$carrera = $_GET['carrera'];
	include_once("../model/DAOasistencia.php");
	$db = new DAOasistencia();
	$materias = $db->getMateriasByCarrera($carrera);
?>
<select name="materias" id="materias" onchange="getUnidadesByMateria(value)">
	<?php
		foreach ($materias as $materia) {
			echo "<option value='$materia->clave'>$materia->descripcion</option>";
		}
	?>
</select>