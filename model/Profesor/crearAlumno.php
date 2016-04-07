<?php
	$matricula = $_POST['matricula'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$grupo = $_POST['grupo'];
	$correo = $_POST['correo'];
	echo $matricula;
	echo $nombres;
	echo $paterno;
	echo $materno;
	echo $grupo;
	echo $correo;
	require_once("../DAOalum.php");
	$db = new DAOalum();
	if(!is_null($matricula)) {
		if (!$db->validarMatricula($matricula)) { // si no existe la matrícula
			$status = $db->agregarAlumno($matricula, $nombres, $paterno, $materno, $grupo, $correo);
			if ($status) {
				header("Location: ../../views/Profesor/Alumnos.php?success");
			} else {
				header("Location: ../../views/Profesor/Alumnos.php?error");
			}
		} else {
			//matricula repetida
		}
	} else {
		$status = $db->agregarAlumnoAI($nombres, $paterno, $materno, $grupo, $correo);
		if($status) {
			header("Location: ../../views/Profesor/Alumnos.php?success");
		} else {
			header("Location: ../../views/Profesor/Alumnos.php?error");
		}
	}
?>