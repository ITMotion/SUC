<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema Único de Calificaciones</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php 
		$descripcion = $_GET['descripcion'];
		include_once("../model/DAOcarrera.php"); 
		$db = new DAOcarrera();
		$row = $db->upCarrera($descripcion);
		$carreras = $db->getCarreras();		
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		<h1>Editar Carrera</h1>
		<form action="../model/Carreras-updateCarrera.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="carrera">Carrera</label>
				<input type="text" placeholder="Ingresa la carrera" name="descripcion" id="descripcion" class="form-control"> 
			</div>
			<button class="btn btn-primary pull-right">Guardar</button>
		</form>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</html>