<?php  
	$grupo = $_GET['grupo'];
	include_once("../model/DAOgrupo.php");
	$db = new DAOgrupo();	
?>

<div class="clearfix"></div>

<br>
	<a href="" class="btn btn-warning" style="width: 40%;">Editar</a>
	<button class="btn btn-danger pull-right" style="width: 40%;" id="btnDelete" onclick="deleteGrupo(<?php echo $grupo ?>)">Eliminar</button>
	