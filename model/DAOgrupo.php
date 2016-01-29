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
			$sql ="SELECT * FROM GRUPOS";

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

		function deleteGrupo($grupo) {
			$sql = "DELETE FROM grupos WHERE grupo = ".$grupo.";";
			$this->bd->executeSQL($sql);
		}

		

	}
?>