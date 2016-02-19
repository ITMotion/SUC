<?php  
	require_once("DAOprofesores.php");
	$dbProfesores = new DAOprofesores();

	$matricula = $_POST['matricula'];
	$nombres = $_POST['nombres'];
	$paterno = $_POST['paterno'];
	$materno = $_POST['materno'];
	$correo = $_POST['email'];
	$tipo = $_POST['tipo'];

	$contraseñaNombre = str_split($nombres);
	$contraseñaPaterno = str_split($paterno);
	$contraseñaMaterno = str_split($materno);
	$contraseñaNumero = rand(12345, 99999);
	$contraseña = $contraseñaNombre[0] . $contraseñaPaterno[0] . $contraseñaMaterno[0] . $contraseñaNumero;

	$dbProfesores->insertProfesor($matricula, $nombres, $paterno, $materno, $correo, $tipo);
	$dbProfesores->createUser($matricula, $contraseña);
	header("Location: ../views/Profesores.php?success");
?>