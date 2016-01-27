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
		<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success col-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Se agregó correctamente el grupo.
		</div>
		<?php } ?>
		<a href="GrupoFrm.php" class="btn btn-primary pull-right">Agregar</a>
	<div class="clearfix"></div>	
	<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover">
					<thead>
						<tr>
							<th></th>
							<th>grupo</th>
							<th>salon</th>
							<th>horario</th>
							<th>carrera</th>
							
						</tr>
					</thead>
					<tbody>
						<?php 
							if(!empty($list)) {
								foreach ($list as $row) { ?>
						<tr>
							<th>
								
								<a id="btnSelect" onclick="">
									<img src="../image/icons/select.png" 
										onmouseover="this.src='../image/icons/select-onclick.png'" 
										onmouseout="this.src='../image/icons/select.png'">
								</a>
						
							</th>
							<th><?php echo $row->grupo; ?></th>
							<th><?php echo $row->salon ?></th>
							<th><?php echo $row->horario ?></th>
							<th><?php echo $row->carrera ?></th>
							
						</tr>
						<?php 
								}
							} 
						?>
					</tbody>
				</table>
			</div>
		</div>

		<br>
		<div class="col-md-4">
			<div id="panel"></div>	
		</div>
	</div>
	<script src="../model/alum-ajax.js"></script>
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
</body>
</html>