<?php 
	//Incluir ambos archivos
	include_once("config.ini.php"); 
	include_once("class.bd.php");
	
	//Se crea una clase con las funciones
	class DAOcarrera
	{
		//Funcion para conectar
		function DAOcarrera()
		{
			$this->connect();
		}

		//Funcion para abrir conexión a base de datos que se encuentra en el archivo class.bd
		function connect()
		{
			$this->bd = new DB;
			$this->bd->openCon();
		}

		//Se hace la consulta y se obtienen los datos
		function getCarreras(){
			$sql="SELECT * FROM carreras;";
			$this->bd->selectSQL($sql);
			return $this->bd->rowresult;
		}
	}
?>