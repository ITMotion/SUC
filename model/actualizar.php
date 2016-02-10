<!DOCTYPE html>

<html>
	<head>
		<title>SUC ACtualziar Información</title>
		<meta charset="UTF-8">
	</head>
	<body>
		<?php

			$matricula = $_POST['$matricula'];
			$nombres = $_POST['$nombres'];
			$paterno = $_POST['$paterno'];
			$materno = $_POST['$materno'];
			$Carrera = $_POST['$Carrera'];
			$tipo = $_POST['$tipo'];

			include_once('DAOprof.php');

			$SQL="UPDATE profesores set nombres='".$nombres."', paterno='".$paterno."', materno='".$materno."', Carrera='".$Carrera."', $tipo='".$tipo."', WHERE $matricula='".$matricula."'";
			mysql_query($SQL); 
		?>
	</body>
</html>