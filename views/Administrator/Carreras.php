<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Carreras</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<?php require_once("../../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<!----------------------------------------Recursos para filtros de tablas ------------------------------------------>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="../../js/jquery.dataTables.js"></script>
	<script src="../../js/dataTableCarreras.js"></script>
	<!----------------------------------------Fin Recursos filtros de tablas ------------------------------------------>

	<?php
		//Se llama al archivo DAOcarrera
		include_once("../../model/DAOcarrera.php");
		//Se asigna la función del archivo DAOcarrera a la variable $carreras
		$db = new DAOcarrera();
		$carreras = $db->getCarreras();
	 ?>
</head>
<body>

	<!--Se llama al menú-->
	<?php include_once("Menu.php"); ?>
	<div class="container">
		<h1 class="">Carreras</h1>
		<?php if (isset($_GET["success"])) {?>
			<div class="alert alert-success col-md-10">
				<button class="close" data-dismiss="alert"><span>&times;</span></button>
				Se agregó la carrera correctamente
			</div>
		<?php } ?>
		<?php if (isset($_GET["updsuccess"])) {?>
			<div class="alert alert-success col-md-10">
				<button class="close" data-dismiss="alert"><span>&times;</span></button>
				Se editó la carrera correctamente
			</div>
		<?php } ?>
		<div id="deleteMessage"></div>
		<a href="CarrerasFrm.php"><button class="btn btn-primary pull-right">Agregar</button></a>
		<div class="clearfix"></div>
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover" id="tblCarreras">
					<thead>
						<tr>
							<th>Carrera</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!--Se sacan los valores de la base de datos y se imprimen-->
						<?php
							if (!is_null($carreras)) {
								foreach ($carreras as $carrera):
						?>
							<tr>
								<th><?php echo $carrera->descripcion; ?></th>
								<th><a href="EditCarrerasFrm.php?codigo=<?php echo $carrera->codigo?>&descripcion=<?php echo $carrera->descripcion?>" >
									<img src="../../image/icons/edit.png"
									onmouseover="this.src='../../image/icons/editcolor.png'"
									onmouseout="this.src='../../image/icons/edit.png'">
								</a></th>
								<th><a href="" onclick="deleteCarreras(<?php echo $carrera->codigo ?>)">
									<img src="../../image/icons/delete.png"
									onmouseover="this.src='../../image/icons/deletecolor.png'"
									onmouseout="this.src='../../image/icons/delete.png'">
								</a></th>
							</tr>
						<?php endforeach; } ?>
					</tbody>
				</table>
			</div>
	</div>
	<script src="../../model/carreras.js"></script>
</body>
</html>
