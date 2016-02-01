<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
	<?php include_once("Menu.html"); ?>
	<div class="container">
		<form action="../model/carrera-crear.php" method="POST" class="form-horizontal">
			<div class="form-group">
				<label for="carrera">Carrera</label>
				<input type="text" placeholder="Ingrese la carrera" name="carrera" id="carrera" class="form-control"> 
			</div>
			<button class="btn btn-primary pull-right">Guardar</button>
		</form>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/script.js"></script>
</body>
</html>