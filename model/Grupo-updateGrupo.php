<?php  
	$grupo = $_POST['grupo'];
	$salon = $_POST['salon'];
	$horario = $_POST['horario'];
	$carrera = $_POST['carrera'];
	

	
	include_once("DAOgrupo.php");
	$db = new DAOgrupo();
	$db->updateGrupo($grupo, $salon, $horario, $carrera);
	header("Location: ../views/Grupos.php?success");
?>