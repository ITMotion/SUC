<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SUC</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<?php 
		if (isset($_GET['error'])) {
			echo "<script> alert('¡Por favor inicia sesión!'); </script>";
		}
	?>
</head>
<body>
	<div class="container" id="content">
		<div id="contenedor">
			<div id="titulo">
				<div class="row">
					<div class="col-md-12" align="center">
						<h1>Bienvenido<br><small>Sistema Único de Calificaciones</small></h1>	
					</div>
				</div>
			</div>
			<div class="row" id="login">
				<div class="col-md-10">
					<form class="form" action="model/login.php" method="POST">
				  		<div class="form-group">
				    		<label class="sr-only" for="inputUser">Usuario</label><br>
				    		<input type="text" class="form-control" id="inputUser" name="user"placeholder="Usuario">
				  		</div>
				  		<div class="form-group">
				   		 	<label class="sr-only" for="inputPassword">Contraseña</label>
				    		<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
				  		</div>
				  		<br>
			  			<button type="submit" class="btn btn-default" id="btnEntrar">Entrar</button>
			  			<br>
			  			<br>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>