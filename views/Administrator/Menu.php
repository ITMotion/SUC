<?php
	//validación de la sesión
	if(!isset($_SESSION["permisos"])) { //si no existen permisos regirige al login
		header("Location: ../index.php?error");
	}
	if (isset($_GET["unauthorized"])) { //si no tiene los permisos correctos para ingresar al módulo
		echo "<script> $(document).ready(function() {
			alert('¡No estás autorizado a este módulo!') }) </script>";
	}
	require_once("../../model/DAOlogin.php");
	$dblogin = new DAOlogin();
	$username = "Administrador";
?>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
				<span class="sr-only">Menú</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">SUC: Sistema Único de Calificaciones</a>
		</div>
		<div class="collapse navbar-collapse" id="menu">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="Alumnos.php">Alumnos</a></li>
				<li><a href="Grupos.php">Grupos</a></li>
				<li><a href="Profesores.php">Profesores</a></li>
				<li><a href="Materias.php">Materias</a></li>
				<li><a href="Asignaturas.php">Asignaturas</a></li>
				<li><a href="Carreras.php">Carreras	</a></li>
				<li class="dropdown">
					<a href="" data-toggle="dropdown"><?php echo $username ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="../../model/logout.php">Cerrar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
