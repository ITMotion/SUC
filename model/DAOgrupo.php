<?php
	require_once("config.ini.php");
	require_once("class.bd.php");

	class DAOgrupo{
		function DAOgrupo(){
			$this->activa_conexion();
		}
		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon(); 
		}

		//obtener la tabla de los grupos
		function GetInfogrupos(){
			$sql ="SELECT * FROM grupos";

			$this->bd->selectSQL($sql);
			if(!empty($this->bd->rowresult)){
				return $this->bd->rowresult;
			}
			else {
				return null;
			}
		}

		function getGrupos($grupo) {
			$sql = "SELECT * FROM grupos WHERE grupo = '".$grupo."';";
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

	
	
		function insertGrupo($grupos, $salon, $horario, $carrera) {
			$sql = "INSERT INTO grupos VALUES ('".$grupos."', '".$salon."', '".$horario."', '".$carrera."');";
			return $this->bd->executeSQL($sql);
		}

		function updateGrupo($grupo, $salon, $horario, $carrera) {
			$sql = "UPDATE grupos SET grupo = '".$grupo."', salon = '".$salon."', horario = '".$horario."', carrera = '".$carrera."' WHERE grupo = '".$grupo."';";
			$this->bd->executeSQL($sql);
		}


		function deleteGrupo($grupo) {
			$sql = "DELETE FROM grupos WHERE grupo = '".$grupo."';";
			$this->bd->executeSQL($sql);
		}

		

	}
?>