<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Asignar materias</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/fonts-gm.css">
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
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>Grupo</th>
							<th>Materia</th>
							<th>Profesor</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($list)) {
								foreach ($list as $row) { ?>
						<tr>
							<th><a href=""><img src="../image/icons/arrow-right2.png" alt=""></a></th>
							<th><?php echo $row->grupo; ?></th>
							<th><?php echo $row->descripcion ?></th>
							<th><?php echo $row->paterno . " " . $row->materno . " " . $row->nombres; ?></th>
						</tr>
						<?php 
								}
							} 
						?>
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<div class="col-md-4">
			<div class="panel"></div>	
		</div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</html>