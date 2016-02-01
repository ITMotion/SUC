<?php 
	include_once("DAOcarrera.php");
	$db = new DAOcarrera();
	$descripcion = $_POST["carrera"];
	$db->setCarrera($descripcion);
	header("Location:../views/Carreras.php?success");
 ?>