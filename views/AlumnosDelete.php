<?php  
	$matricula = $_GET['matricula'];
	include_once("../model/DAOalum.php");
	$db = new DAOalum();
	$db->deleteAlumno($matricula);
	
?>
