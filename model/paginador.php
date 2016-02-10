<?php
	
	//Conexion a la base de datos.

	$con = mysql_connect("localhost", "user", " ") or die (mysql_error());
	mysql_select_db("escuela", $con) or die (mysql_error());

	//Consulta
	$mostrar_sql = "SELECT * FROM Alumnos ";
	$mostrar_alum = mysql_query($mostrar_sql, $con);
	$total_registros = mysql_num_rows($mostrar_alum);

	//Se establece el limitador
	$tamano_paginador = 10;

	//examino la pagina a mostrar y el inicio del registro a mostrar

	$pagina = $_GET["pagina"];
	if (!$pagina)
	{
		$inicio = 0;
		$pagina = 1;
	}
	else
	{
		$inicio = ($pagina - 1) * $tamano_paginador;
	}

	//Calculo el total de las paginas
	$total_paginas = ceil($total_registros / $tamano_paginador);

	//Se muestran los datos que se requieran de la tabla de alumnos.
	$consulta = "SELECT * matricula FROM Alumnos";
	$rs = mysql_query($consulta, $con);

	while($rows = mysql_fetch_array($rs))
	{
		
	}
?>