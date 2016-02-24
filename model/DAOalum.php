<?php
	require_once("config.ini.php");
	require_once("class.bd.php");

	class DAOalum{
		function DAOalum(){
			$this->activa_conexion();
		}
		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon();
		}

		//obtener la tabla de los alumnos
		function GetInfoAlumnos(){
			$sql ="SELECT * FROM ALUMNOS";

			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getAlumnoByMatricula($matricula) {
			$sql="SELECT * FROM ALUMNOS WHERE matricula =$matricula";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		//obtiene un listado de carreras
		function getCarreras() {
			$sql = "SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}


		function getGruposPorCarrera($carrera) {
			$sql = "SELECT * FROM grupos WHERE carrera = ".$carrera;
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function insertAlumno($nombres, $paterno, $materno, $grupo) {
			$sql = "INSERT INTO alumnos VALUES (null, '".$nombres."', '".$paterno."', '".$materno."', '".$grupo."');";
			return $this->bd->executeSQL($sql);
		}

		function updateAlumno($nombres, $paterno, $materno, $grupo, $matricula) {
			$sql = "UPDATE alumnos SET nombres = '".$nombres."', paterno = '".$paterno."', materno = '".$materno."', grupo = '".$grupo."' WHERE matricula = ".$matricula.";";
			$this->bd->executeSQL($sql);
		}

		function deleteAlumno($matricula) {
			$sql = "DELETE FROM alumnos WHERE matricula = '".$matricula."';";
			$this->bd->executeSQL($sql);
		}

		function importarAlumnos($matricula, $nombres, $paterno, $materno, $grupo){
			$sql ="INSERT INTO alumnos VALUES(".$matricula.",'".$nombres."','".$paterno."','".$materno."','".$grupo."')";
			$this->bd->executeSQL($sql);
		}

		function validarGrupo($grupo) {
			$sql = "SELECT grupo FROM grupos WHERE grupo = '".$grupo."';";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return true;
			}
			else {
				return false;
			}
		}

		function validarMatricula($matricula) {
			$sql = "SELECT matricula FROM alumnos WHERE matricula = ".$matricula.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return true;
			}
			else {
				return false;
			}
		}

		function getAlumnosByProfesor($matProfesor){
			$sql = "SELECT A.matricula, A.nombres, A.paterno, A.materno, A.grupo
				FROM alumnos A INNER JOIN grupomateria GM ON A.grupo = GM.idgrupo WHERE idprofesor = ".$matProfesor.";";
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}
	}
?>
