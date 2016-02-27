<?php

	/*Instanciar la clase DAOmaterias en donde se hace la conexión a la base de datos y las consultas sql */
	include_once("DAOmaterias.php");
	$db = new DAOmaterias();

	/*Obtener todas las variables del formulario:*/
	//Variables de la materia
	$descripcion = $_POST['descripcion'];
	$grado = $_POST['grado'];
	$carrera = $_POST['carrera'];

	/*insertar las variables a la tabla de materias*/
	$db->crearMateria($descripcion, $grado, $carrera);

	//Variables de las unidades
	$numUnidades = $_POST["numUnidades"];
	$fechasInicio = $_POST["fechasinicio"];
	$fechasFinales = $_POST["fechasfinales"];

	$materia = $db->getLastMateria();
	/*insertar las variables de unidad a la tabla de unidades*/
	$unidad = 1;
	for ($i=0; $i < $numUnidades; $i++) {
		$db->crearUnidad($fechasInicio[$i], $fechasFinales[$i], $unidad, $materia[0]->clave);
		$unidad++;
	}

	if(!isset($_POST["enlace"])){
		header("Location: ../views/Administrator/materias.php?success");
	}
	elseif ($_POST["enlace"] == "asignaturas") {
		header("Location: ../views/Administrator/GruposMateriasFrm.php");
	}
?>
