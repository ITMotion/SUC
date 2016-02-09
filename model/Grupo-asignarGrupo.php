<?php  
	$grupos = $_POST['grupos'];
	$salon = $_POST['salon'];
	$horario = $_POST['horario'];
	$carrera = $_POST['carrera'];
	
	include_once("DAOgrupo.php");
	$db = new DAOgrupo();
	$db->insertGrupo($grupos, $salon, $horario, $carrera);
	if(!isset($_POST["enlace"])){
		header("Location: ../views/Grupos.php?success");
	}
	elseif ($_POST["enlace"] == "asignaturas") {
		header("Location: ../views/GruposMateriasFrm.php");
	}
?>