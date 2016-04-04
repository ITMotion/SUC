<?php
	/*
	* @author: Gustavo Valderrama
	* @email: gustavoavalderrama@gmail.com
	* @descripcion: Menu para el usuario Alumno
	*/
	require_once("../../model/SesionAlumno.php"); //control de sesiones
	require_once("../../model/DAOlogin.php");
	$dblogin = new DAOlogin();
	$user = $dblogin->getInfoAlumno($_SESSION["user"]);
	$username = $user[0]->nombres;
?>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		
		<!-- Header del Menú -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuAlumno">
				<span class="sr-only">Menú</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">SUC: Alumno</a>
		</div>
		<!-- Fin del header -->
		
		<!-- Comienzan las opciones del menú -->
		<div class="collapse navbar-collapse" id="menuAlumno">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="controlador">Calificaciones</a></li>
				<li><a class="controlador">Asistencia</a></li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown"><?php echo $username; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="">Mis Datos</a></li>
						<li><a href="../../model/logout.php">Cerrar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- Termina el menú -->
		
	</div>
</nav>