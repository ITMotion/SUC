<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignar materias</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php 
		include_once("../model/DAOgm.php"); 
		$db = new DAOgm();
		$list = $db -> getGmInfo();
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success col-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Se asignó correctamente la materia
		</div>
		<?php } ?>
		<a href="GruposMateriasFrm.php" class="btn btn-primary pull-right">Agregar</a>
		<div class="clearfix"></div>
		<div class="table-responsive">
			<table class="table table-condensed table-striped table-hover">
				<thead>
					<tr>
						<th>Grupo</th>
						<th>Materia</th>
						<th>Profesor</th>
						<th class="text-right">Acciones</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(!empty($list)) {
							foreach ($list as $row) { ?>
					<tr>
						<th><?php echo $row->grupo; ?></th>
						<th><?php echo $row->descripcion ?></th>
						<th><?php echo $row->paterno . " " . $row->materno . " " . $row->nombres; ?></th>
						<th class="text-right">
							<a class="btn btn-success" data-toggle="modal" href="#ventana" onclick="setValues('<?php echo $row->grupo ?>', '<?php echo $row->descripcion; ?>')">Ver</a>
							<a class="btn btn-warning">Editar</a>
						</th>
					</tr>
					<?php 
							}
						} 
					?>
				</tbody>
			</table>
		</div>
	</div>
	
	<script>
	function setValues(group, mat) {
		document.getElementById("title").innerHTML= group;
		document.getElementById("materia").innerHTML = mat;
	}
	</script>

	<div class="modal fade" id="ventana" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h1 id="title"></h1>
					<h1 id="materia"></h1>
				</div>
				<div class="modal-body">
					<form action="" class="form-horizontal">
						<div class="form-group">
							<label for=""></label>
							<input type="checkbox">
					</form>
				</div>
				<div class="modal-footer">
					<a class="btn btn-danger" data-dismiss="modal">Cerrar</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</html>