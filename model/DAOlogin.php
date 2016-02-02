<?php  
	require_once("config.ini.php");
	require_once("class.bd.php");
	require_once('class.no_injections.php');

	class DAOlogin {
		function DAOlogin(){
			$this->activa_conexion();
		}
		function activa_conexion(){
			$this->bd = new DB;
			$this->bd->openCon();
			$this->validador = new no_injections;
		}

		function establecerValores($a, $b) {
			$this->user = $this->validador->da_formato($a, "text", $this->bd->cnn);
			$this->password = $this->validador->da_formato($b ,"text", $this->bd->cnn);
		}

		function comprobarCredenciales() {
			$sql = "CALL login (".$this->user.",".$this->password.");";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}	
	}
?>