<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>SUC - Sistema Único de Calificaciones - Profesores</title>
	<?php require_once("../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->
	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<!----------------------------------------Recursos para filtros de tablas ------------------------------------------>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>
	<script src="../js/dataTableProf.js"></script>
	<!----------------------------------------Fin Recursos filtros de tablas ------------------------------------------>

	<?php 
		include_once("../model/DAOprofesores.php"); 
		$dbprofesores = new DAOprofesores();
		$profesores = $dbprofesores->getProfesores();
	?>
</head>
<body>
	<?php include_once("Menu.html"); ?>
	<div class="container">
		<div id="deleteMessage">
			<?php if(isset($_GET['success'])){ ?>
				<div class="alert alert-success col-md-10">
					<button class="close" data-dismiss="alert"><span>&times;</span></button>
					Se agregó correctamente al profesor.
				</div>
			<?php }  ?>
		</div>
		<h1 class="col-md-6"><b>Profesores</b></h1>
		<a href="ProfesoresFrm.php" class="btn btn-primary pull-right">Agregar</a>
		<div class="clearfix"></div>
		<div class="table-responsive">
			<table class="table table-condensed table-striped table-hover" id="tblProfesores">
				<thead>
					<tr>
						<th>Matrícula</th>
						<th>Nombres</th>
						<th>Paterno</th>
						<th>Materno</th>
						<th>Correo</th>
						<th>Tipo</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if (!is_null($profesores)) {
							foreach ($profesores as $profesor) {
								if ($profesor->tipo == 1) {
									$tipo = "Tiempo Completo";
								} else {
									$tipo = "Asignatura";
								}
					?>
					<tr class="rwP">
						<th class="matricula"><?php echo $profesor->matricula; ?></th>
						<th><?php echo $profesor->nombres; ?></th>
						<th><?php echo $profesor->paterno; ?></th>
						<th><?php echo $profesor->materno; ?></th>
						<th><?php echo $profesor->correo; ?></th>
						<th><?php echo $tipo; ?></th>
						<th><a href="ProfesoresEditFrm.php?mat=<?php echo $profesor->matricula ?>">
							<img src="../image/icons/edit.png" 
								onmouseover="this.src='../image/icons/editcolor.png'" 
								onmouseout="this.src='../image/icons/edit.png'">
						</a></th>
						<th class="btnDelete"><a>
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
	<script src="../model/profesores.js"></script>
</body>
</html>