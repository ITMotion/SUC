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
	$dbProfesores->createUser($matricula, $contraseña); //crear el usuario para poder ingresar a la plataforma

	$message = "Estimado ".$nombres." ".$paterno." ".$materno.", a continuación se le proporciona su número de usuario y contraseña para ingresar al Sistema Único de Calificaciones: \n Usuario: ".$matricula."\n Contraseña: ".$contraseña."\n Para cualquier duda o aclaración envíe un correo a soporte@itmotions.net";

	mail($correo, "SUC - Usuario y Contraseña", $message); //enviar el correo electrónico con sus claves
	header("Location: ../views/Profesores.php?success");
?>