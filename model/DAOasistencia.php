<?php 
	require_once("config.ini.php");
	require_once("class.bd.php");

	/**
	* 
	*/
	class DAOasistencia {
		
		function DAOasistencia() {
			$this->activa_conexion();
		}

		function activa_conexion() {
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		//obtiene una lista de carreras en general 
		function getCarreras() {
			$sql = "SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}

		function getMateriasByCarrera($carrera) {
			$sql = "SELECT * FROM carreras WHERE carrera = ".$carrera.";";
			$this->bd->selectSQL($sql);
			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}
	}