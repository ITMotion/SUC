<?php 
	$asignatura = $_POST['asignatura'];
	$materia = $_POST['materia'];
	$profesor = $_POST['profesor'];
?>
<div class="container">
	<div class="row">
		<a onclick="controlador(1)" class="controlador btn btn-warning pull-right">Regresar a Calificaciones</a>	
	</div>
	<div class="row">
		<h1>Detalle de asignatura</h1>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Materia: <?php echo $materia; ?></h4>
		<h4 class="col-md-6">Profesor: <?php echo $profesor; ?></h4>	
	</div>
</div>