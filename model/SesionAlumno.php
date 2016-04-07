<?php
	/*
	* @author: Gustavo Valderrama
	* @email: gustavoavalderrama@gmail.com
	* @description: Control de sesiones para el usuario alumno
	*/

	session_start();

	//si no existen permisos redirige al login
	if(!isset($_SESSION["permisos"])) { 
		header("Location: ../../index.php?error");
	}

	//en caso de que los permisos no sean los correctos
	if($_SESSION['permisos'] != 3) {
		//comprueba si los permisos corresponden a un administrador, lo redirige a su módulo.
		if ($_SESSION['permisos'] == 1) {
			header("Location: ../views/Administrator/index.php?unauthorized");
		}
		//si corresponden a un profesor, de igual manera, lo redirige a su módulo.
		elseif ($_SESSION['permisos'] == 2) {
			header('Location: ../views/Profesor/index.php?unauthorized');
		}
	}

	//en caso de que el usuario alumno intente entrar a otro módulo en el que no tenga permisos de acceso
	if (isset($_GET["unauthorized"])) { 
		echo "<script> $(document).ready(function() {
			alert('¡No estás autorizado a este módulo!') }) </script>";
	}
?>