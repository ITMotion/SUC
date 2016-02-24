<?php  
	//Se obtiene la clave de la materia
	$materia = $_GET["materia"];

	//Se instancía la clase DAOmateria para la consulta a la base de datos
	include_once("../model/DAOmateria.php");
	$db = new DAOmateria();
	$materia = $db->getMateriaInfo($materia);
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times</button>
			<h3 class="modal-title"><?php echo $materia[0]->descripcion ?></h3>
		</div>
	</div>
</div>