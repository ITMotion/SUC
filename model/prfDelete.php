<?php 
	require_once("DAOprofesores.php");
	$dbprofesores = new DAOprofesores();
	$matricula = $_POST['matricula'];
	$dbprofesores->deleteProfesor($matricula);
	$dbprofesores->deleteUser($matricula);
?>
<div class="alert alert-danger col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se eliminó correctamente al profesor con matrícula: <b><?php echo $matricula; ?></b>
</div>