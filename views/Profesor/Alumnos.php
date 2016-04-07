<!DOCTYPE  html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php require_once("../../model/SesionProfesor.php"); ?> <!--Contról de Sesiones-->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<title>SUC: Sistema Único de Calificaciones - Alumnos</title>

	<!--jQuery-->
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>

	<!--Bootstrap-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="../../js/bootstrap.min.js"></script>

	<!--Recursos para el plugin de DataTables-->
	<link rel="stylesheet" type="text/css" href="../../css/datatables.min.css">
	<script src="../../js/datatables.min.js"></script>
	
	<!--Recursos de esta página -->
	<script src="../../model/alumnos.js"></script>
	<script type="text/javascript" src="../../js/dataTableAlumnos.js"></script>
	<?php
		require_once("../../model/DAOalum.php");
		$dbAlumnos = new DAOalum();
		$list = $dbAlumnos->getAlumnosByProfesor($_SESSION["user"]);
	?>
</head>
<body>
	<?php require_once("Menu.php") ?>
	<div class="container">
		<h1 class="col-md-4"><b>Alumnos</b></h1>
		
		<a href="AlumnosFrm.php" class="btn btn-primary pull-right" style="width: 20%; margin: 2%;">Agregar</a>

		<div class="clearfix"></div>
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover" id="tblAlumnos">
					<thead>
						<tr>
							<th>Matricula</th>
							<th>Nombres</th>
							<th>Paterno</th>
							<th>Materno</th>
							<th>Correo</th>
							<th>Grupo</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!is_null($list)) {
								foreach ($list as $row) { ?>
						<tr>
							<th><?php echo $row->matricula; ?></th>
							<th><?php echo strtoupper($row->nombres); ?></th>
							<th><?php echo strtoupper($row->paterno); ?></th>
							<th><?php echo strtoupper($row->materno); ?></th>
							<th><?php echo $row->correo; ?></th>
							<th><?php echo strtoupper($row->grupo); ?></th>
							<th><a href="EditAlumnosFrm.php?matricula=<?php echo $row->matricula; ?>">
								<img src="../../image/icons/edit.png"
								onmouseover="this.src='../../image/icons/editcolor.png'"
								onmouseout="this.src='../../image/icons/edit.png'">
							</a></th>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
	</div>
	<script src="../../model/alum-ajax.js"></script>
</body>
</html>
