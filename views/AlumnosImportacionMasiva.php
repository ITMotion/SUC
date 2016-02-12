<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once("../model/SesionAdministrador.php"); // control de sesiones?>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Importación Másiva</title>
	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->
</head>
<body>
<?php
	if (isset($_POST['submit'])) {
		$fname = $_FILES['csv']['tmp_name'];
		$handle = fopen($fname, "r");
		include_once("../model/DAOalum.php");
		$db = new DAOalum();
		$registros = 0;
		while (($openfile= fgetcsv($handle,1000,",")) !== FALSE) {
			if (sizeof($openfile) == 5) {
				$matricula = $openfile[0];
				$nombres = $openfile[1];
				$paterno = $openfile[2];
				$materno= $openfile[3];
				$grupo = $openfile[4];
				if (!$db->validarMatricula($matricula)) {
					if ($db->validarGrupo($grupo)) {
						$db->importarAlumnos($matricula, $nombres, $paterno, $materno, $grupo);
						$registros++;
					} else {
						$grupoInvalido[] = $grupo;
					}	
				} else {
					$matriculaInvalida[] = $matricula;
				}
			} else {
				$malFormato = true;
				break;
			}
		}
	}
?>
<?php include_once("menu.html") ?>
<div class="container">
	<?php if(isset($malFormato)) { ?>
		<div class="alert alert-danger col-md-12">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			El archivo csv está mal formado, favor de revisar el formato. {Matrícula, Nombres, Apellido Paterno, Apellido Materno, Grupo}
		</div>
	<?php } ?>
	<h1>Se agregaron un total de <?php echo $registros; ?> registros</h1>
	<?php if(isset($matriculaInvalida)) { ?> <!--Si hay registros con matrícula inválida-->
		<h1>Alumnos con matrícula invalida <?php echo sizeof($matriculaInvalida); ?></h1>
	<?php } if (isset($grupoInvalido)) { ?> <!--Si hay registros con grupo inválido-->
		<h1>Alumnos con grupo invalido <?php echo sizeof($grupoInvalido); ?></h1>
	<?php } ?>
</div>
</body>
</html>