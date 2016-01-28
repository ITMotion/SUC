<? php
	
	require_once("confing.ini.php");
	require_once("class.bd.php");

	class DAOprofesor
	{
		function DAOprofesor()
		{
			$this->activa_conexion();
		}

		function activa_conexion()
		{
			$this->bd = new DB;
			$this->bd->OpenCon();
		}

		//Llamar la tabla de profesores
		function GetInfoprofesor()
		{
			$sql = "SELECT * FROM profesor";	

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

		function insertprof($matricula, $nombres, $paterno, $materno, $tipo, $carrera)
		{
			$sql = "INSERT INTO profesor VALUES (null, '"$matricula"', '"$nombres"', '"$paterno"', '"$materno"', '"$tipo"', '"$carrera"')";

			return $this->bd->executeSQL($sql);
		}
	}
	
?>