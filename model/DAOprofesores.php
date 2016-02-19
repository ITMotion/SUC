<?php  
	require_once("config.ini.php");
	require_once("class.bd.php");

	/**
	* @author: Gustavo Valderrama
	* @date: 19/02/2016
	* @email: valderramagp@gmail.com
	*/
	class DAOprofesores
	{
		
		function __construct()
		{
			$this->bd = new DB;
			$this->bd->openCon();
		}

		function getProfesores() {
			$sql = "SELECT * FROM profesores";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getInfoProfesor($matricula) {
			$sql = "SELECT * FROM profesores WHERE matricula = ".$matricula;
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function insertProfesor($matricula, $nombres, $paterno, $materno, $correo, $tipo) {
			$sql = "INSERT INTO profesores VALUES (".$matricula.", '".$nombres."', '".$paterno."', '".$materno."', '".$correo."', ".$tipo.");";
			return $this->bd->executeSQL($sql);
		}

		function deleteProfesor($matricula) {
			$sql = "DELETE FROM profesores WHERE matricula = ".$matricula.";";
			return $this->bd->executeSQL($sql);
		}

		function editProfesor($matricula, $nombres, $paterno, $materno, $correo, $tipo) {
			$sql = "UPDATE profesores SET nombres = '".$nombres."', paterno = '".$paterno."', materno = '".$materno."', correo = '".$correo."', tipo = ".$tipo." WHERE matricula = ".$matricula;
			return $this->bd->executeSQL($sql);
		}

		function createUser($matricula, $contraseña) {
			$sql = "INSERT INTO usuarios VALUES (".$matricula.", '".$contraseña."', 2);";
			return $this->bd->executeSQL($sql);
		}

		function deleteUser($matricula) {
			$sql = "DELETE FROM usuarios WHERE username = ".$matricula.";";
			return $this->bd->executeSQL($sql);
		}
	}
?>