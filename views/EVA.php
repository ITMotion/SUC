<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	$asignatura = $_GET["asignatura"];
	require_once("../model/DAOeva.php");
	$db = new DAOeva();
	$alumnos = $db->getAlumnosPorGrupo($grupo);
	$porcentajesCalif = $db->getPorcentajeCalif($asignatura);
?>
<a href="" class="btn btn-warning pull-right" data-toggle="modal" data-target="#configuracion">Configuración</a>
<div class="clearfix"></div>
<br>
<h2 id="unidadC" style="display: none"><?php echo $unidad; ?></h2> <!--Para guardar las calificaciones-->
<h2 id="materiaC" style="display: none"><?php echo $materia; ?></h2> <!--Para guardar las calificaciones-->
<div id="msjSuccess"></div>
<!------------------------------------------------Comienza tabla-------------------------------------------------------------->
<div class="table-responsive">
	<table class="table t1able-condensed table-striped table-hover">
		<thead>
				<tr id="tableConfigSection">
					<th></th>
					<th>Porcentajes:</th>
					<th id="confSaber"><?php echo $porcentajesCalif[0]->saber; ?></th>
					<th id="confHacer"><?php echo $porcentajesCalif[0]->saberHacer; ?></th>
					<th id="confSer"><?php echo $porcentajesCalif[0]->ser; ?></th>
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
				<th>Desempeño</th>
				<th>AM</th>
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
					<th class="alumno"><?php echo $alumno->matricula ?></th>
					<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres) ?></th>
					<th><input type="number" min="0" max="100" name="saber" class="cal_saber" value="0"></th>
					<th><input type="number" min="0" max="100" name="hacer" class="cal_hacer" value="0"></th>
					<th><input type="number" min="0" max="100" name="ser"   class="cal_ser" value="0"></th>
					<th class="asistencia"><?php echo $porcentajeAsist; ?></th>
					<th class="cal_total"></th>
					<th class="cal_total_letras"></th>
					<th><input type="checkbox" class="AM"></th>
					<th><a class="btnSaveCalificacion"><img src="../image/icons/save2.png"></a></th>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<!------------------------------------------------Termina tabla-------------------------------------------------------------->
<!--------------------------------------------Comienza modal de configuraciones---------------------------------------------->
<div id="configuracion" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2>Configuración de Porcentajes de Calificación</h2>
			</div>
			<div class="modal-body">
				<form id="frmConfig">
					<div class="form-group">
						<label for="saberC">Saber</label>
						<input type="number" value="saberC" name="saberC" class="form-control configuraciones" name="saberC" id="saberC" placeholder="<?php echo $porcentajesCalif[0]->saber ?>">
					</div>
					
					<div class="form-group">
						<label for="hacerC">Hacer</label>
						<input type="number" value="hacerC" class="form-control configuraciones" name="hacerC" id="hacerC" placeholder="<?php echo $porcentajesCalif[0]->saberHacer ?>">
					</div>

					<div class="form-group">
						<label for="serC">Ser</label>
						<input type="number" value="serC" class="form-control configuraciones" name="serC" id="serC" placeholder="<?php echo $porcentajesCalif[0]->ser ?>">
					</div>

					<input type="hidden" name="asignatura" value="<?php echo $asignatura ?>"> <!--Pasamos el valor de la asignatura--> 
			</div>
			<div class="modal-footer">
				<button onclick="saveConfig()" class="btn btn-primary pull-right" id="btnConfig" disabled="true">Guardar</button>
				</form>
				<button class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
