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
			$sql = "SELECT M.clave, M.descripcion, M.grado, C.descripcion AS carrera
						FROM materias M
						INNER JOIN carreras C ON M.carrera = C.codigo";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getNumUnidades($materia) {
			$sql = "SELECT COUNT(descripcion) AS total FROM unidades WHERE materia = ".$materia.";";
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

		function getLastMateria() {
			$sql = "SELECT MAX(clave) AS clave FROM materias;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function crearUnidad($inicio, $final, $unidad, $materia) {
			$sql = "INSERT INTO unidades VALUES (null, ".$unidad.", '".$inicio."', '".$final."', ".$materia.");";
			return $this->bd->executeSQL($sql);		
		}
	}
?>