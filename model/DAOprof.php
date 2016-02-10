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
		//Se obtienen las carreras que contenga la tabla de "carreras"
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

		function EliminarProfesor($nombres, $paterno, $materno, $tipo, $carrera)
		{
			$sql = "DELETE FROM profesores WHERE matricula = ".$matricula.";";
			return $this->bd->executeSQL($sql);
		}

		function EditarProfesor($nombres, $paterno, $materno, $tipo, $carrera)
		{
			$sql = "SELECT FROM profesores WHERE matricula = ".$matricula.";";
			return $this->bd->executeSQL($sql);
		}

		function UpdateProfesor($nombres, $paterno, $materno, $tipo, $carrera)
		{
			$sql = "UPDATE profesores SET nombres = '".$nombres."', paterno = '".$paterno."', materno = '".$materno."', tipo = '".$tipo."', carrera = '".$carrera."';";
			return $this->bd->executeSQL($sql); 
		}
	}
?>
