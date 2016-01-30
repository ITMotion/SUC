<?php  
	include_once("DAOcarrera.php");
	$db = new DAOcarrera();
	$db->upCarrera($descripcion);
	header("Location: ../views/Carreras.php?success");
?>