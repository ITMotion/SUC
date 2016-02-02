<?php
	
	require_once("config.ini.php");
	require_once("class.bd.php");

	class DAOprof
	{
		function DAOprof()
		{
			$this->activa_conexion();
		}

		function activa_conexion()
		{
			$this->bd = new DB;
			$this->bd->openCon();
		}

		function getProfesores() {
			$sql = "SELECT * FROM profesores;";
			$this->bd->selectSQL($sql);

			if(!empty($this->bd->rowresult))
			{
				return $this->bd->rowresult;
			}
			else
			{
				return null;
			}
		}

		//Se obtienen las carreras que contenga la tabla de "carreras"x
		function getCarreras()
		{
			$sql = "SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);

			if(!empty($this->bd->rowresult))
			{
				return $this->bd->rowresult;
			}
			else
			{
				return null;
			}
		}

		function insertProfesor($nombres, $paterno, $materno, $tipo, $carrera)
		{
		
			$sql = "INSERT INTO profesores VALUES (null, '".$matricula."', '".$nombres."', '".$paterno."', '".$materno."', '".$tipo."', '".$carrera."')";

			return $this->bd->executeSQL($sql);
		}
	}
?>
