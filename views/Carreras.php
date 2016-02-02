<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<?php 
		//Se llama al archivo DAOcarrera
		include_once("../model/DAOcarrera.php");
		//Se asigna la función del archivo DAOcarrera a la variable $carreras
		$db = new DAOcarrera();
		$carreras = $db->getCarreras();
	 ?>
</head>
<body>
	
	<!--Se llama al menú-->
	<?php include_once("Menu.html"); ?>
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
		
		<a href="CarrerasFrm.php"><button class="btn btn-primary pull-right">Agregar</button></a>
		<div class="clearfix"></div>
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th>Carrera</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!--Se sacan los valores de la base de datos y se imprimen-->
						<?php foreach ($carreras as $carrera): ?>
							<tr>
								<th><?php echo $carrera->descripcion; ?></th>
								<th><a href="EditCarrerasFrm.php?codigo=<?php echo $carrera->codigo?>&descripcion=<?php echo $carrera->descripcion?>" >
									<img src="../image/icons/edit.png" 
									onmouseover="this.src='../image/icons/editcolor.png'" 
									onmouseout="this.src='../image/icons/edit.png'">
								</a></th>
								<th><a href="" onclick="deleteCarreras(<?php echo $carrera->codigo ?>)">
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
	<script src="../model/carreras.js"></script>
</body>
</html>