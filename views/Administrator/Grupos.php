<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Grupos</title>
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
	<script src="../../js/dataTableGrup.js"></script>
	<!----------------------------------------Fin Recursos filtros de tablas ------------------------------------------>
	<?php
		include_once("../../model/DAOgrupo.php");
		$db = new DAOgrupo();
		$list = $db -> GetInfogrupos();
	?>
</head>
<body>
	<?php include_once("../Menu.html") ?>
	<div class="container">
		<div id="deleteMessage"></div>
		<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success col-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Se agregó correctamente el grupo.
		</div>
		<?php } ?>
		<?php if (isset($_GET['deleteSuccess'])) { ?>
			<div class="alert alert-success col-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Se eliminó correctamente el grupo.
			</div>
		<?php } ?>


		<h1 class="col-md-6">Grupos</h1>
		<a href="GrupoFrm.php" class="btn btn-primary pull-right">Agregar</a>
	<div class="clearfix"></div>

			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover" id="tblGrupos">
					<thead>
						<tr>
							<th>Grupo</th>
							<th>Salon</th>
							<th>Horario</th>
							<th>Carrera</th>
							<th></th>
							<th></th>

						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($list)) {
								foreach ($list as $row) { ?>
						<tr>

							<th><?php echo $row->grupo; ?></th>
							<th><?php echo $row->salon; ?></th>
							<th><?php echo $row->horario; ?></th>
							<th><?php echo $row->carrera; ?></th>
							<th style="width:2%;"><a href="EditGrupoFrm.php?grupo=<?php echo $row->grupo?>">
								<img src="../../image/icons/edit.png"
								onmouseover="this.src='../../image/icons/editcolor.png'"
								onmouseout="this.src='../../image/icons/edit.png'">
							</a></th>
							<th style="width: 2%;"><a id="btnDelete" onclick="deleteGrupo('<?php echo $row->grupo?>')">
								<img src="../../image/icons/delete.png"
								onmouseover="this.src='../../image/icons/deletecolor.png'"
								onmouseout="this.src='../../image/icons/delete.png'">
							</a></th>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
		</div>
		<br>
	</div>
	<script src="../../model/grupo-ajax.js"></script>
</body>
</html>
