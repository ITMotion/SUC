<?php 
	include_once("config.ini.php");
	require_once("class.bd.php");

	/**
	* @author: Gustavo Valderrama
	* @date: 28/01/2016
	* @email: valderramagp@gmail.com
	*/
	class DAOmaterias
	{
		
		function DAOmaterias()
		{
			$this->connect();
		}

		function connect() {
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		function getMaterias() {
			$sql = "SELECT M.descripcion, M.grado, C.descripcion AS carrera, COUNT(U.id) AS unidades
				FROM materias M 
				INNER JOIN carreras C ON M.carrera = C.codigo 
				INNER JOIN unidades U ON M.clave = U.materia";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getCarreras() {
			$sql = "SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function crearMateria($descripcion, $grado, $carrera) {
			$sql = "INSERT INTO materias VALUES (null, '".$descripcion."', ".$grado.", ".$carrera.");";
			return $this->bd->executeSQL($sql);
		}
	}
?>