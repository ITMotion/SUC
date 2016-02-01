<!DOCTYPE  html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>grupos</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php
		include_once("../model/DAOgrupo.php"); 
		$db = new DAOgrupo();
		$list = $db -> GetInfogrupos();
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		<div id="deleteMessage"></div>
		<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success col-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Se agregó correctamente el grupo.
		</div>
		<?php } ?>
		<h1 class="col-md-6">Grupos</h1>
		<a href="GrupoFrm.php" class="btn btn-primary pull-right">Agregar</a>
	<div class="clearfix"></div>	
	
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							
							<th>grupo</th>
							<th>salon</th>
							<th>horario</th>
							<th>carrera</th>
							<th></th>
							<th></th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($list)) {
								foreach ($list as $row) { ?>
						<tr>
						
							<th><?php echo $row->grupo; ?></th>
							<th><?php echo $row->salon; ?></th>
							<th><?php echo $row->horario; ?></th>
							<th><?php echo $row->carrera; ?></th>
							<th><a href="../views/EditGrupoFrm.php?grupo=<?php echo $row->grupo?>">
								<img src="../image/icons/edit.png" 
								onmouseover="this.src='../image/icons/editcolor.png'" 
								onmouseout="this.src='../image/icons/edit.png'">
							</a></th>
							<th><a id="btnDelete" onclick="deleteGrupo('<?php echo $row->grupo?>')">
								<img src="../image/icons/delete.png" 
								onmouseover="this.src='../image/icons/deletecolor.png'" 
								onmouseout="this.src='../image/icons/delete.png'">
							</a></th>
							
						</tr>
						<?php 
								}
							} 
						?>
					</tbody>
				</table>
			
		</div>
		<br>
		
	</div>
	<script src="../model/grupo-ajax.js"></script>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</html>