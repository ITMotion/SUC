<?php  
	$id = $_GET['matricula'];
	include_once("../model/DAOalum.php");
	$db = new DAOalum();

	
?>

<div class="clearfix"></div>

<br>
	<a href="EditAlumnosFrm.php?matricula=<?php echo $id; ?>" class="btn btn-warning" style="width: 40%;">Editar</a>
	<button class="btn btn-danger pull-right" style="width: 40%;">Eliminar</button>
	