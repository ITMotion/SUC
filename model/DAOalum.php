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

		

	}
?>