<?php
	session_start();
	require_once("../../model/ADAOCalificaciones.php");
	$dbCal = new DAOCalificaciones();
	$asignaturas = $dbCal->obtenerAsignaturas($_SESSION['user']);
?>
<?php foreach ($asignaturas as $asignatura): ?>
	<h1><?php echo $asignatura->materia ?></h1>
<?php endforeach ?>