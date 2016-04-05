<?php
	session_start();
	require_once("../../model/ADAOCalificaciones.php");
	$dbCal = new DAOCalificaciones();
	$asignaturas = $dbCal->obtenerAsignaturas($_SESSION['user']);
?>
<style>
	.card {
		background-color: #2780e3;
		color: #222222;
		margin-top: 1%;
		padding: 4%;
		transition-property: background-color, color;
		transition-timing-function: ease-out;
		transition-duration: 1s;
	}

	.card:hover {
		background-color: #222222;
		color: white;
	}
	h1 {
		margin: 0;
	}
	h4 {
		margin: 0;
	}
</style>
<div class="container">
	<?php foreach ($asignaturas as $asignatura): ?>
		<div class="card">
			<h1 class="hidden idAsignatura"><?php echo $asignatura->id; ?></h1>
			<h1 class="materia"><?php echo $asignatura->materia; ?></h1><br />
			<h4 class="profesor"><?php echo $asignatura->profesor; ?></h4>
		</div>
	<?php endforeach ?>
</div>