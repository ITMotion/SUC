<?php  
	$id = $_GET['clave'];
	include_once("../model/DAOgm.php");
	$db = new DAOgm();
	$list = $db->getDays($id);
	$data = $db->getGmDetailedInfo($id);
	
?>
<h1 class="col-md-10"><?php echo $data[0]->descripcion; ?></h1>
<h1 class="col-md-2"><?php echo $data[0]->grupo; ?></h1>
<div class="clearfix"></div>
<?php 
	$i=0;
	foreach ($list as $day) {
		$i++;
?>
	<div class="group">
			<p>Día <?php echo $i.": ".$day->dia ?></p>
	</div>
<?php 
	} 
?>
<br>
	<button class="btn btn-warning" style="width: 40%;">Editar</button>
	<button class="btn btn-danger pull-right" style="width: 40%;">Eliminar</button>
	



