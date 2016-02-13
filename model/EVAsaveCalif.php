<?php 
	require_once("DAOeva.php");
	$bdCalif = new DAOeva();	

	$alumno = $_POST["alumno"];
	$materia = $_POST['materia'];
	$unidad = $_POST["unidad"];
	$saber = $_POST["saber"];
	$hacer = $_POST["hacer"];
	$ser = $_POST["ser"];
	$total = $_POST["total"];

	$bdCalif->insertCalif($alumno, $materia, $unidad, $saber, $hacer, $ser, $total);
?>
<div class="alert alert-success col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se registró correctamente la calificación del alumno <?php echo $alumno; ?>
</div>
