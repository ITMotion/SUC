<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8">
		<title>SUC: Sistema Unico de Calificaciones</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<?php
			//Se llama la clase que contiene la consulta SQL
			include_once("../model/DAOprof.php");
			$db = new DAOprof(); //Se crea la BD de DAOprof
			$carreras = $db->getCarreras(); 
		?>
	</head>
	<body>
		<?php include_once("menu.html") ?>
		<div class="container">
			<h2>Agregar un nuevo Profesor</h2>
			<form action="../model/Profesor-asignarProfesor.php" methos="POST" class="form-horizontal">
				<div class="form-group">
					<select name="carrera" id="carrera" class="form-control" onchange"getCarreras(value)">
						<?php
							if(!empty($carreras))
							{
								foreach ($carreras as $carreras) 
								{
									//Con el echo se muesran las carreras 
									echo "<option value='$carreras->codigo'>$carreras->descripcion</option>";
								}
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<input name="nombres" id="nombres" class="form-control" plaeceholder="Ingrese su nombre(s)">
				</div>
				<div class="form-group">
					<input name="paterno" id="paterno" class="form-control" plaeceholder="Ingrese su Apellido Paterno">
				</div>
				<div class="form-group">
					<input name="materno" id="materno" class="form-control" plaeceholder="Ingrese su Apellido Materno">
				</div>
				<div class="form-group">
					<select name="tipo" id="tipo" class="form-control" plaeceholder="Seleccione su tipo de profesor">
						<option value="PTC">Profesor de Tiempo Completo (PTC)</option>
						<option value="PA">Profesor de Asignatura (PA)</option>
					</select>
				</div>
				<button class="btn btn-primary pull-right">Enviar</button>
			</form>
 		</div> 
 		<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
 		<script type="../js/bootstrap.min.js"></script>
 		<script type="../js/scripts.js"></script>
 		<script type="../model/alum-ajax.js"></script>
	</body>
</html>