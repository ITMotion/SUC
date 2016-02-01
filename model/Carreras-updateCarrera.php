<?php  
	include_once("DAOcarrera.php");
	$db = new DAOcarrera();
	$descripcion = $_POST["carrera"];
	$db->upCarrera($descripcion);
	header("Location: ../views/Carreras.php?upsuccess");
?>