<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>UTC - Lista de Asistencia</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<?php include_once("menu.html"); ?>
	<div class="container">
		<h1>Lista de Asistencia</h1>
		<form class="form">
			<div class="form-group">
				<label for="grupo">Grupo:</label>
				<select name="grupo" id="grupo" class="form-control">
					<option value="SI51">SI51</option>
					<option value="SI52">SI52</option>
				</select>
			</div>
			<div class="form-group">
				<label for="materia">Materia:</label>
				<select name="materia" id="materia" class="form-control">
					<option value="0001">Desarrollo de Aplicaciones III</option>
					<option value="0002">Calidad en el Desarrollo de Software</option>
					<option value="0003">Ingeniería de Software II</option>
					<option value="0004">Integradora II</option>
				</select>
			</div>
			<div class="form-group">
				<label for="fecha">Mes:</label>
				<div class="form-group">
					<select name="fecha" id="fecha" class="form-control">
						<option value="2016-01">Enero</option>
						<option value="2016-02">Febrero</option>
					</select>
				</div>
			</div>
		</form>
	
	<button id="run" class="btn btn-primary pull-right">Imprimir Lista</button>
	</div>
	<div class="container">
		<div id="tblAsistencia">
		</div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../model/asistencia.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>