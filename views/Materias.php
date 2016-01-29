<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php 
		include_once("../model/DAOmaterias.php");
		$db = new DAOmaterias();
		$materias = $db->getMaterias();
	?>
</head>
<body>
	<?php include_once("Menu.html") ?>
	<div class="container">
		<h1 class="col-md-6"><b>Materias</b></h1>
		<a href="MateriasFrm.php"><button class="btn btn-primary pull-right col-md-2">Nueva</button></a>
		<div class="clearfix"></div>
		<div class="table-responsive">
			<table class="table table-condensed table-striped table-hover">
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
					<?php foreach ($materias as $materia): ?>
						<tr>
							<th><?php echo $materia->descripcion; ?></th>
							<th><?php echo $materia->unidades ?></th>
							<th><?php echo $materia->grado; ?></th>
							<th><?php echo $materia->carrera; ?></th>
							<th><a href="">
								<img src="../image/icons/edit.png" 
								onmouseover="this.src='../image/icons/editcolor.png'" 
								onmouseout="this.src='../image/icons/edit.png'">
							</a></th>
							<th><a href="">
								<img src="../image/icons/delete.png" 
								onmouseover="this.src='../image/icons/deletecolor.png'" 
								onmouseout="this.src='../image/icons/delete.png'">
							</a></th>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</html>