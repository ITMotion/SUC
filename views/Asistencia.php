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
	<?php  
		include_once("../model/DAOasistencia.php");
		$db = new DAOasistencia();
		$carreras = $db->getCarreras();
	?>
</head>
<body>
	<?php include_once("menu.html"); ?>
	<div class="container">
		<h1>Lista de Asistencia</h1>
	<?php if(!is_null($carreras)) { ?>
		<div class="form-group">
			<select name="carrera" id="carrera" class="form-control" onchange="getGruposByCarrera(value)">
				<option value="">Seleccione una carrera</option>
				<?php  
					foreach ($carreras as $carrera) {
						echo "<option value='$carrera->codigo'>$carrera->descripcion</option>";
					}
				?>
			</select>
		</div>
	<?php } ?>
		<div id="grupos"></div> <!--Se mostrará por medio de ajax, ver asistencia.js función getGruposByCarrera-->
		<div id="materias"></div> <!--Se mostrará por medio de ajax, ver asistencia.js función getMateriasByGrupo-->
		<div id="unidades"></div> <!--Se mostrará por medio de ajax, ver asistencia.js función getUnidadesByMateria-->
		<div id="tableAsistencia"></div>
	</div>
	<script type="text/javascript" charset="UTF-8" src="../model/asistencia.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>