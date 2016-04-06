<?php
	session_start();
	require_once("../../model/ADAOCalificaciones.php");
	$dbCal = new DAOCalificaciones();
	$asignaturas = $dbCal->obtenerAsignaturas($_SESSION['user']);
?>
<style>
	.card {
		background-color: #3498db;
		color: #222222;
		margin-top: 2%;
		padding: 4%;
		transition-property: background-color, color;
		transition-timing-function: ease-out;
		transition-duration: 1s;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}

	.card:hover {
		background-color: #222222;
		color: white;
	}

	tr .default {
		color: black;
	}

	h1 {
		margin: 0;
	}

	h4 {
		margin: 0;
	}

	.tableCal {
		display: none;
	}

	.tableCal h5 {
		text-align: center;
	}
	table {
		text-align: center;
	}
</style>
<div class="container">
	<?php foreach ($asignaturas as $asignatura): ?>
		<div class="card">
			<h1 class="materia"><?php echo $asignatura->materia; ?></h1><br />
			<h4 class="profesor"><?php echo $asignatura->profesor; ?></h4>
			<div class="row tableCal">
				<?php 
					$calificaciones = $dbCal->obtenerCalificaciones($_SESSION['user'], $asignatura->id);
							if (!is_null($calificaciones)) {
				?>
				<br />	
				<div class="table-responsive">
					<table class="table table-condensed table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>Unidad</th>
								<th>Saber</th>
								<th>Hacer</th>
								<th>Ser</th>
								<th>Final</th>
								<th>Asistencia</th>
								<th>AM</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$numUnidades = sizeof($calificaciones);
							$sumatoriaCal = 0;
							foreach ($calificaciones as $calificacion):
								$sumatoriaCal += $calificacion->final;
								$am = ($calificacion->accionMejora == 1) ? "X" : "";
								$tr = ($calificacion->final < 80) ? "danger" : "info";

								//obtiene la asistencia del alumno
								$asistencia = $dbCal->getAsistencia($_SESSION['user'], $calificacion->unidad, $asignatura->id);
								//obtener el total de días de la materia por la unidad
								$asistenciaTotal = $dbCal->getAsistenciaTotal($_SESSION['user'], $calificacion->unidad, $asignatura->id);
								if ($asistenciaTotal[0]->TOTAL != 0) {
									$porcentajeAsist = round($asistencia[0]->parcial / $asistenciaTotal[0]->TOTAL * 100);
								} else {
									$porcentajeAsist = 0;
								}
						?>
							<tr class='info'>
								<th><?php echo $calificacion->unidad; ?></th>
								<th><?php echo $calificacion->saber; ?></th>
								<th><?php echo $calificacion->hacer; ?></th>
								<th><?php echo $calificacion->ser; ?></th>
								<th class='<?php echo $tr; ?>'><?php echo $calificacion->final; ?></th>
								<th><a><?php echo $porcentajeAsist; ?></a></th>
								<th><?php echo $am ?></th>
							</tr>
						<?php 
							endforeach; 
							$promedio = $sumatoriaCal/$numUnidades;
							$trPromedio = ($promedio < 80) ? "danger" : "info";
						?>
							<tr class="info">
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th>Promedio:</th>
								<th class="<?php echo $trPromedio; ?>"><?php echo $promedio; ?></th>
							</tr>
						</tbody>
					</table>
				</div>
				<?php 	
					} else {
						echo "<h5>¡No han subido calificaciones! Regresa más tarde.</h5>";
					}
				?>
			</div>
		</div>
	<?php endforeach ?>
	<br />
</div>