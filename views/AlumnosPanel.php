<?php  
	$matricula = $_GET['matricula'];
	include_once("../model/DAOalum.php");
	$db = new DAOalum();
?>

<div class="clearfix"></div>

<br>
	<a href="EditAlumnosFrm.php?matricula=<?php echo $matricula; ?>" class="btn btn-warning" style="width: 40%;">Editar</a>
	<button class="btn btn-danger pull-right" style="width: 40%;" id="btnDelete" onclick="deleteAlumno(<?php echo $matricula ?>)">Eliminar</button>
	