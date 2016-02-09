<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	require_once("../model/DAOeva.php");
	$db = new DAOeva();
	$alumnos = $db->getAlumnosPorGrupo($grupo);
?>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th></th>
				<th></th>
				<th><input type="number" value="70" id="confSaber"></th>
				<th><input type="number" value="20" id="confHacer"></th>
				<th><input type="number" value="10" id="confSer"></th>
				<th></th>
				<th></th>
			</tr>
			<tr>
				<th>Matrícula</th>
				<th>Nombre</th>
				<th>Saber</th>
				<th>Saber Hacer</th>
				<th>Ser</th>
				<th>Asistencia</th>
				<th>Calificación Final</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=0; foreach ($alumnos as $alumno):
				$i++;
				$asistencia = $db->getAsistencia($alumno->matricula, $unidad, $materia);
				$asistenciaTotal = $db->getAsistenciaTotal($alumno->matricula, $unidad, $materia);
				$porcentajeAsist = round($asistencia[0]->parcial / $asistenciaTotal[0]->TOTAL * 100);
			?>
				<tr>
					<th><?php echo $alumno->matricula ?></th>
					<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres) ?></th>
					<th><input type="number" max="100" name="saber<?php echo $i ?>" class="cal_saber" value="0"></th>
					<th><input type="number" max="100" name="hacer<?php echo $i ?>" class="cal_hacer" value="0"></th>
					<th><input type="number" max="100" name="ser<?php echo $i ?>"   class="cal_ser" value="0"></th>
					<th><?php echo $porcentajeAsist . "%" ?></th>
					<th class="cal_total">0</th>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
