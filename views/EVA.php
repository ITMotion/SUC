<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	require_once("../model/DAOeva.php");
	$db = new DAOeva();
	$alumnos = $db->getAlumnosPorGrupo($grupo);
?>
<a href="" class="btn btn-warning pull-right" data-toggle="modal" data-target="#configuracion">Configuración</a>
<div class="clearfix"></div>
<br>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th></th>
				<th>Porcentajes:</th>
				<th id="confSaber">70</th>
				<th id="confHacer">20</th>
				<th id="confSer">10</th>
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
				<th>Final</th>
				<th></th>
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
					<th><input type="number" min="0" max="100" name="saber<?php echo $i ?>" class="cal_saber" value="0" <?php if($porcentajeAsist < 85){ echo "disabled='true'";} ?>></th>
					<th><input type="number" min="0" max="100" name="hacer<?php echo $i ?>" class="cal_hacer" value="0" <?php if($porcentajeAsist < 85){ echo "disabled='true'";} ?>></th>
					<th><input type="number" min="0" max="100" name="ser<?php echo $i ?>"   class="cal_ser" value="0" <?php if($porcentajeAsist < 85){ echo "disabled='true'";} ?>></th>
					<th><?php echo $porcentajeAsist . "%" ?></th>
					<th class="cal_total"><?php if($porcentajeAsist < 85){ echo "NA";} ?></th>
					<th><a href=""><img src="../image/icons/save2.png"></a></th>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<div id="configuracion" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2>Configuración de Porcentajes de Calificación</h2>
			</div>
			<div class="modal-body">
				<form action="../model/saveConfig.php" method="POST" id="frmConfig">
					<div class="form-group">
						<label for="saberC">Saber</label>
						<input type="number" value="saberC" name="saberC" class="form-control configuraciones" id="saberC">
					</div>
					
					<div class="form-group">
						<label for="hacerC">Hacer</label>
						<input type="number" value="hacerC" class="form-control configuraciones" id="hacerC">
					</div>

					<div class="form-group">
						<label for="serC">Ser</label>
						<input type="number" value="serC" class="form-control configuraciones" id="serC">
					</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary pull-right" id="btnConfig" disabled="true">Guardar</button>
				</form>
				<button class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
