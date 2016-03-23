<?php
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	$asignatura = $_GET["asignatura"];
	require_once("../../model/DAOeva.php");
	$db = new DAOeva();
	$alumnos = $db->getAlumnosPorGrupo($grupo);
	$porcentajesCalif = $db->getPorcentajeCalif($asignatura);
	$infoAsignatura = $db->getInfoAsignatura($asignatura);
?>
<hr style=" display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    border-style: inset;
    border-width: 1px;">
<button class="btn btn-warning pull-right" data-toggle="modal" data-target="#configuracion">Configuración</button>
<div class="clearfix"></div>
<br>
<h2 id="unidadC" style="display: none"><?php echo $unidad; ?></h2> <!--Para guardar las calificaciones-->
<h2 id="materiaC" style="display: none"><?php echo $materia; ?></h2> <!--Para guardar las calificaciones-->
<h2 id="asignaturaC" style="display: none"><?php echo $asignatura; ?></h2> <!--Para guardar las calificaciones-->

<h3 class="col-md-12"><b>Carrera:</b> <?php echo $infoAsignatura[0]->carrera; ?></h3>
<h3 class="col-md-3"><b>Grupo:</b> <?php echo $infoAsignatura[0]->grupo; ?></h3>
<h3 class="col-md-3"><b>Materia:</b> <?php echo $infoAsignatura[0]->materia ?></h3>
<h3 class="col-md-3"><b>Turno:</b> <?php echo $infoAsignatura[0]->horario ?></h3>
<h3 class="col-md-3"><b>Grado:</b> <?php echo $infoAsignatura[0]->grado ?></h3>

<div class="clearfix"></div>

<div id="msjSuccess"></div>
<div class="clearfix"></div>
<!------------------------------------------------Comienza tabla-------------------------------------------------------------->
<div class="table-responsive">
	<table id="tblEVA" class="table t1able-condensed table-striped table-hover">
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
			<?php
			$i=0;
			foreach ($alumnos as $alumno):
				$i++;
				$asistencia = $db->getAsistencia($alumno->matricula, $unidad, $asignatura);
				$asistenciaTotal = $db->getAsistenciaTotal($alumno->matricula, $unidad, $asignatura);
				if ($asistenciaTotal[0]->TOTAL != 0) {
					$porcentajeAsist = round($asistencia[0]->parcial / $asistenciaTotal[0]->TOTAL * 100);	
				} else {
					$porcentajeAsist = 0;
				}
				$calificacion = $db->getCalificacionAlumno($alumno->matricula, $materia, $unidad);
				if (is_null($calificacion)) { //si no tiene calificacion
			?>
					<tr>
						<th class="alumno"><?php echo $alumno->matricula ?></th>
						<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres) ?></th>
						<th class="th_saber"><input type="number" min="0" max="100" name="saber" class="cal_saber" value="0"></th>
						<th class="th_hacer"><input type="number" min="0" max="100" name="hacer" class="cal_hacer" value="0"></th>
						<th class="th_ser"><input type="number" min="0" max="100" name="ser"   class="cal_ser" value="0"></th>
						<th class="asistencia"><?php echo $porcentajeAsist; ?></th>
						<th class="cal_total"></th>
						<th class="cal_desempeño"></th>
						<th class="tr_am"></th>
						<th class="th_btn"><a class="btnSaveCalificacion">
							<img src="../../image/icons/save.png"
								onmouseover="this.src='../../image/icons/savecolor.png'"
								onmouseout="this.src='../../image/icons/save.png'">
						</a></th>
					</tr>
			<?php
				}
				else { //si tiene calificación
					if($porcentajeAsist > 85) {
						if($calificacion[0]->final >= 95){
							$desempeño = "AU";
						}
						elseif($calificacion[0]->final < 95 && $calificacion[0]->final >= 85) {
							$desempeño = "DE";
						} elseif($calificacion[0]->final < 85 && $calificacion[0]->final >= 80) {
							$desempeño = "SA";
						} else {
							$desempeño = "NA";
						}
					} else {
						$desempeño = "NA";
					}
			?>
					<tr>
						<th class="alumno"><?php echo $alumno->matricula; ?></th>
						<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres); ?></th>
						<th class="th_saber"><?php echo $calificacion[0]->saber; ?></th>
						<th class="th_hacer"><?php echo $calificacion[0]->hacer; ?></th>
						<th class="th_ser"><?php echo $calificacion[0]->ser; ?></th>
						<th class="asistencia"><?php echo $porcentajeAsist; ?></th>
						<th class="cal_total"><?php echo $calificacion[0]->final; ?></th>
						<th class="cal_desempeño"><?php echo $desempeño; ?></th>
						<th class="tr_am"><?php if($calificacion[0]->accionMejora == 1){ echo "SA"; } ?></th>
						<th class="th_btn"><a class="btnEditarCampos">
							<img src="../../image/icons/edit.png" 
								onmouseover="this.src='../../image/icons/editcolor.png'"
								onmouseout="this.src='../../image/icons/edit.png'">
						</a></th>
					</tr>
			<?php } endforeach ?>
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
				<button class="btn btn-primary pull-right" id="btnConfig" disabled="true">Guardar</button>
				</form>
				<button class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
