<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Materias</title>
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
	<script src="../../js/dataTableMat.js"></script>
	<!----------------------------------------Fin Recursos filtros de tablas ------------------------------------------>
	<?php
		include_once("../../model/DAOmaterias.php");
		$db = new DAOmaterias();
		$materias = $db->getMaterias();
	?>
</head>
<body>
	<?php include_once("Menu.php") ?>
	<div class="container">

		<!--Mensaje de exito en eliminar-->
		<div id="deleteMessage"></div>

		<h1 class="col-md-6"><b>Materias</b></h1>
		<a href="MateriasFrm.php"><button class="btn btn-primary pull-right col-md-2">Nueva</button></a>
		<div class="clearfix"></div>
		<div class="table-responsive">
			<table id="tbl" class="table table-condensed table-striped table-hover">
				<thead>
					<tr>
						<th>Materia</th>
						<th>Unidades</th>
						<th>Grado</th>
						<th>Carrera</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					<?php
						if (!is_null($materias)) {
							foreach ($materias as $materia):
								$unidades = $db->getNumUnidades($materia->clave);
					?>
								<tr>
									<th><?php echo $materia->descripcion; ?></th>
									<th><?php echo $unidades[0]->total ?></th>
									<th><?php echo $materia->grado; ?></th>
									<th><?php echo $materia->carrera; ?></th>
									<th><a data-toggle='modal' data-target="#verMateria" onclick="verMateria(<?php echo $materia->clave ?>)">
										<img src="../../image/icons/edit.png"
										onmouseover="this.src='../../image/icons/editcolor.png'"
										onmouseout="this.src='../../image/icons/edit.png'">
									</a></th>
									<th><a onclick="deleteMateria(<?php echo $materia->clave ?>)">
										<img src="../../image/icons/delete.png"
										onmouseover="this.src='../../image/icons/deletecolor.png'"
										onmouseout="this.src='../../image/icons/delete.png'">
									</a></th>
								</tr>
					<?php
							endforeach;
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<div id="verMateria" class="modal fade" role="dialog"></div>
	<script src="../../model/mat-ajax.js"></script>
</body>
</html>
