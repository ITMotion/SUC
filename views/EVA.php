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
					<th><input type="number" max="100" id="saber<?php echo $i ?>"></th>
					<th><input type="number" max="100" id="hacer<?php echo $i ?>"></th>
					<th><input type="number" max="100" id="ser<?php echo $i ?>"></th>
					<th><?php echo $porcentajeAsist . "%" ?></th>
					<th><p id="total<?php echo $i ?>"></p></th>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<?php $i=0; foreach ($alumnos as $alumno): $i++;?>
	<script>
		$(function() {
			console.log(1);
			$("#saber<?php echo $i ?>").keyup(function(){
				var saber = parseFloat($(this).val());
				var hacer = parseFloat($("#hacer<?php echo $i ?>").val());
				var ser = parseFloat($("#ser<?php echo $i ?>").val());
				$("#total<?php echo $i ?>").text(saber + hacer + ser);
			});
			$("#hacer<?php echo $i ?>").keyup(function(){
				var saber = parseFloat($("#saber<?php echo $i ?>").val());
				var hacer = parseFloat($(this).val());
				var ser = parseFloat($("#ser<?php echo $i ?>").val());
				$("#total<?php echo $i ?>").text(saber + hacer + ser);
			});
			$("#ser<?php echo $i ?>").keyup(function(){
				var saber = parseFloat($("#saber<?php echo $i ?>").val());
				var hacer = parseFloat($("#hacer<?php echo $i ?>").val());
				var ser = parseFloat($(this).val());
				$("#total<?php echo $i ?>").text(saber + hacer + ser);
			});
		});
	</script>
<?php endforeach ?>