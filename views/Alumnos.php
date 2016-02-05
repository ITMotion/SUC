<!DOCTYPE  html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Alumnos</title>
	
	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<!----------------------------------------Recursos para filtros de tablas ------------------------------------------>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>
	<script src="../js/dataTableAlumn.js"></script>
	<!----------------------------------------Fin Recursos filtros de tablas ------------------------------------------>

	<?php
		require_once("../model/SesionAdministrador.php"); // control de sesiones
		include_once("../model/DAOalum.php"); 
		$db = new DAOalum();
		$list = $db -> GetInfoAlumnos();
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		
		<div id="deleteMessage"></div>
		<?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success col-md-10">
				<button class="close" data-dismiss="alert"><span>&times;</span></button>
				Se agregó correctamente al alumno.
			</div>
		<?php } ?>
		<h1 class="col-md-6"><b>Alumnos</b></h1>
		<a href="AlumnosFrm.php" class="btn btn-primary pull-right">Agregar</a>
		<div class="clearfix"></div>	
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover" id="tblAlumnos">
					<thead>
						<tr>
							<th>Matricula</th>
							<th>Nombres</th>
							<th>Paterno</th>
							<th>Materno</th>
							<th>Grupo</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($list)) {
								foreach ($list as $row) { ?>
						<tr>
							<!--<th>
								
								<a id="btnSelect" onclick="EditAlumnos(<?php echo $row->matricula ?>)">
									<img src="../image/icons/select.png" 
										onmouseover="this.src='../image/icons/select-onclick.png'" 
										onmouseout="this.src='../image/icons/select.png'">
								</a>
						
							</th>-->
							<th><?php echo $row->matricula; ?></th>
							<th><?php echo $row->nombres ?></th>
							<th><?php echo $row->paterno ?></th>
							<th><?php echo $row->materno ?></th>
							<th><?php echo $row->grupo ?></th>
							<th><a href="EditAlumnosFrm.php?matricula=<?php echo $row->matricula; ?>">
								<img src="../image/icons/edit.png" 
								onmouseover="this.src='../image/icons/editcolor.png'" 
								onmouseout="this.src='../image/icons/edit.png'">
							</a></th>
							<th><a onclick="deleteAlumno(<?php echo $row->matricula ?>)">
								<img src="../image/icons/delete.png" 
								onmouseover="this.src='../image/icons/deletecolor.png'" 
								onmouseout="this.src='../image/icons/delete.png'">
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
	<script src="../model/alum-ajax.js"></script>
</body>
</html>