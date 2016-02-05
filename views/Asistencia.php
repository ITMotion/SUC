<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>UTC - Lista de Asistencia</title>
	
	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->
	
	<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php
		session_start();
		if($_SESSION["permisos"] != 2) {
			if($_SESSION['permisos'] == 1) {
				header('Location: Administrator.php?unauthorized');
			}
		}
		include_once("../model/DAOasistencia.php");
		$db = new DAOasistencia();
		$asignaturas = $db->getAsignaturasByProfesor($_SESSION["user"]);
	?>
</head>
<body>
	<?php include_once("menu.html"); ?>
	<div class="container">
		
		<div class="col-md-8">
			<!--Estas variables están definidas y se obtienen en el menú-->
			<h1>Bienvenido, <?php echo $user[0]->nombres . " " . $user[0]->paterno . " " .$user[0]->materno ?></h1>
			<h4>
				<?php if ($user[0]->tipo == "PA") { echo "Profesor de Asignatura"; } else { echo "Profesor de Tiempo Completo"; } ?>
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
						<?php foreach ($asignaturas as $asignatura): ?>
							<th>
								<a id="btnSelect" onclick="getUnidadesByMateria(<?php echo $asignatura->idmateria; ?>, '<?php echo $asignatura->grupo; ?>')">
									<img src="../image/icons/select.png" 
										onmouseover="this.src='../image/icons/select-onclick.png'" 
										onmouseout="this.src='../image/icons/select.png'">
								</a>
							</th>
							<th><?php echo $asignatura->grupo; ?></th>
							<th><?php echo $asignatura->matDescripcion; ?></th>
						<?php endforeach ?>
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
		<div id="tableAsistencia" class="col-md-12"></div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../model/asistencia.js"></script>
</body>
</html>