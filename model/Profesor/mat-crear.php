<?php
	/*Instanciar la clase DAOmaterias en donde se hace la conexión a la base de datos y las consultas sql */
	include_once("../DAOmaterias.php");
	$db = new DAOmaterias();

	/*Obtener todas las variables del formulario:*/
	//Variables de la materia
	$descripcion = $_POST['descripcion'];
	$grado = $_POST['grado'];
	$carrera = $_POST['carrera'];

	/*insertar las variables a la tabla de materias*/
	$id = $db->crearMateriaId($descripcion, $grado, $carrera);
	echo "<p id='idMat'>".$id."</p>";
?>