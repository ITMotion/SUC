<!-- Recursos de está página -->
<link rel="stylesheet" href="css/MisDatos.css">

<?php 
	session_start();
	require_once("../../model/DAOlogin.php");
	$dblogin = new DAOlogin();
	$user = $dblogin->getInfoAlumno($_SESSION["user"]);
	$username = $user[0]->nombres;
?>
<div class="container">
	<div id="divAlertas"></div>
	<div class="row">
		<h2><?php echo $user[0]->nombres . " ". $user[0]->paterno . " " . $user[0]->materno; ?></h2>
	</div>
	<br />
	<form class="form-horizontal">

		<div class="form-group">
			<label for="email" class="sr-only">Email:</label>
			<div class="input-group">
				<div class="input-group-addon"><span class="glyphicon glyphicon-envelope" ></span></div>
				<input type="email" name="email" id="email" class="form-control" placeholder="<?php echo $user[0]->correo; ?>" disabled="true">
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="sr-only">Contraseña:</label>
			<div class="input-group">
				<div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
				<input type="password" id="password" name="password" class="form-control" placeholder="Ingrese una nueva contraseña" disabled="true">
			</div>
		</div>
		
		<div class="form-group" id="contraseñaAnterior">
			<label for="oldPassword" class="sr-only">Contraseña anterior:</label>
			<div class="input-group">
				<div class="input-group-addon"><span class="glyphicon glyphicon-hourglass"></span></div>
				<input type="password" id="oldPassword" name="oldPassword" class="form-control" placeholder="Ingrese su contraseña anterior">
			</div>
		</div>
		
		<button type="submit" class="btn btn-primary pull-right" id="btnGuardar" disabled="true"><span class="glyphicon glyphicon-save"></span> Guardar</button>
		<button class="btn btn-info pull-right" id="btnModificar"><span class="glyphicon glyphicon-edit"></span> Modificar</button>
		<button class="btn btn-warning" id="btnCancelar" disabled="true"><span class="glyphicon glyphicon-trash"></span> Cancelar</button>
	</form>
</div>