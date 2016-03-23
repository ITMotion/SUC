<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php require_once("../../model/SesionProfesor.php"); ?> <!--Contról de Sesiones-->
    <title>SUC: Sistema Único de Calificaciones - Asignaturas</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
  	<script src="../../js/bootstrap.min.js"></script>
  	<script src="../../js/scripts.js"></script>
  	<!--------------------------Fin recursos de bootstrap-------------------------->
    <?php
      require_once("../../model/DAOgm.php");
      $tblAsignaturas = new DAOgm();
      $carreras = $tblAsignaturas->getCarreras();
    ?>
  </head>
  <body>
    <?php include_once("Menu.php") ?>
    <div class="container">
      <h1>Nueva Asignatura</h1>
      <?php if(!is_null($carreras)) { ?>
      <form class="" action="../../model/Profesor/crearAsignatura.php" method="POST" id="frmAsignatura" onsubmit="return true">

        <div class="form-group">
          <label for="carrera">Seleccione la carrera de la materia que desea agregar</label>
          <select class="form-control selectAsignatura" name="carrera" id="carrera">
            <option value="0">Seleccione una carrera</option>
            <?php foreach ($carreras as $carrera): ?>
              <option value=" <?php echo $carrera->codigo; ?> "><?php echo $carrera->descripcion; ?></option>
            <?php endforeach; ?>
              <option value="0">Otra</option>
          </select>
        </div>

        <div id="Part2"></div>
      <?php } else { ?>
        <div class="alert alert-warning col-md-10">
  				<button class="close" data-dismiss="alert"><span>&times;</span></button>
  				Actualmente no existe ninguna carrera, por favor contacta al administrador para que la añada a la base de datos
  			</div>
      <?php } ?>
    </div>
    <script src="../../model/asignaturaFrm.js"></script>
  </body>
</html>
