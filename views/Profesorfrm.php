<!DOCTYPE html>

<html>
	<head>
		<meta charset="en">
		<title>Sistema Unico de Calificaciones</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<?php
			include_once("../model/DAOprofesor.php");
			$db = new DAOprofesor();
			$profesores = $db->GETInfoprofesor();

			if(isset($_GET['success']))
			{
				if($_GET['success']==2)
				{
					echo "<script> alert('El nuevo profesor que desea agregar ya existe')</script>";
				}
			}
		?>
	</head>
	<body>
		<?php include_once("menu.html") ?>

		<div id="container">
			<h2>Agregar nuevo Profesor</h2>
			<form action="../model/profesor-asignarprofesor.php" method="POST" class="form-horizontal"></form>
			<div class="groupteacher">
				<select name="matricula", id="matricula" class="form-control" onchanges="GETInfoprofesor(value)"></select>
			</div>
		</div>
		<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../model/listadeprofesores.php"></script>
	</body>
</html>