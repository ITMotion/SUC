<?php
class no_injections{
	var $valor;
	var $tipo; 
	
	function formateo(){
		$this->valor=get_magic_quotes_gpc() ? stripslashes ($this->valor) : $this->valor;
		$this->valor=function_exists('mysqli_real_escape_string') ? mysqli_real_escape_string($this->cnn,$this->valor) : mysqli_escape_string($this->cnn,$this->valor);
		
		switch($this->tipo){
			case "text": 
				$this->valor=($this->valor!="") ? "'".$this->valor."'" : "NULL"; 
			break;
		}
	}
	
	function da_formato($valor,$tipo,$conex){
		$this->valor=$valor;
		$this->tipo=$tipo; 
		$this->cnn=$conex; 
		$this->formateo();
		return $this->valor;
	}
}
?>