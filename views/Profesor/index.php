<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Asistencia</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php require_once("../../model/SesionProfesor.php"); //control de sesiones ?>
	<!---Recursos de Bootstrap-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--Fin recursos de bootstrap-->

	
	<!--Recursos para el plugin de DataTables-->
	<link rel="stylesheet" type="text/css" href="../../css/datatables.min.css">
	<script src="../../js/datatables.min.js"></script>
	<!--Fin de Recursos para el plugin de DataTables-->

	<?php
		require_once("../../model/SesionProfesor.php"); //control de sesiones
		include_once("../../model/DAOasistencia.php");
		$db = new DAOasistencia();
		$asignaturas = $db->getAsignaturasByProfesor($_SESSION["user"]);
	?>
</head>
<body>
	<?php include_once("Menu.php"); ?>
	<div class="container">

		<div class="col-md-8">
			<!--Estas variables están definidas y se obtienen en el menú-->
			<h1>Bienvenido, <?php echo $user[0]->nombres . " " . $user[0]->paterno . " " .$user[0]->materno ?></h1>
			<h4>
				<?php if ($user[0]->tipo == 2) { echo "Profesor de Asignatura"; } else { echo "Profesor de Tiempo Completo"; } ?>
			</h4>
		</div>
		<br>
		<div class="col-md-4">
			<h4>Asignaturas:</h4>
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Grupo</th>
							<th>Materia</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if (!is_null($asignaturas)) {
								foreach ($asignaturas as $asignatura): ?>
							<tr>
								<th>
									<a id="btnSelect" onclick="getUnidadesByMateria(<?php echo $asignatura->idmateria; ?>, '<?php echo $asignatura->grupo; ?>', '<?php echo $asignatura->idasignatura ?>')">
										<img src="../../image/icons/select.png"
											onmouseover="this.src='../../image/icons/select-onclick.png'"
											onmouseout="this.src='../../image/icons/select.png'">
									</a>
								</th>
								<th><?php echo $asignatura->grupo; ?></th>
								<th><?php echo $asignatura->matDescripcion; ?></th>
							</tr>
						<?php endforeach; } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="clearfix"></div>
		<br>
		<br>
		<div id="unidades"></div> <!--Se mostrará por medio de ajax, ver asistencia.js función getUnidadesByMateria-->
		<div class="clearfix"></div>
		<br>
		<br>
		<div id="divResponse" class="col-md-12"></div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../../model/asistencia.js"></script>
	<script type="text/javascript" charset="UTF-8" src="../../model/EVA.js"></script>
</body>
</html>
