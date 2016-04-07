<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SUC: Sistema Único de Calificaciones - Alumno</title>
	
	<!--jQuery-->
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>

	<!--Bootstrap-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script src="../../js/bootstrap.min.js"></script>

	<!-- Recursos de está página -->
	<link rel="stylesheet" href="../../css/alumnoindex.css">
	<script src="controller.js"></script>

	<!--Recursos de MisDatos.php -->
	<script src="MisDatos.js"></script>
</head>
<body>
	<?php require_once("Menu.php"); ?>
	<div class="container" id="content">
		<div class="col-lg-12">
			<div class="jumbotron">
			  	<div class="container">
				  	<h1>¡Bienvenido, <?php echo $username; ?>!</br>
				    <small>Sistema Único de Calificaciones</small></h1>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>