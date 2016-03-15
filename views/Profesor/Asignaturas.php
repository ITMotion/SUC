<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once("../../model/SesionProfesor.php"); ?> <!--Contról de Sesiones-->
    <title>SUC: Sistema Único de Calificaciones - Asignaturas</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--- Recursos de Bootstrap -->
  	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
  	<script src="../../js/bootstrap.min.js"></script>
  	<script src="../../js/scripts.js"></script>
  	<!-- Fin recursos de bootstrap -->

    <!--Recursos para el plugin de DataTables-->
    <link rel="stylesheet" type="text/css" href="../../css/datatables.min.css">
    <script src="../../js/datatables.min.js"></script>
    <script src="../../js/DTassignmentProfesor.js"></script>
    <!--Fin de Recursos para el plugin de DataTables-->

    <?php
      include_once("../../model/DAOgm.php");
      $db = new DAOgm();
      $asignaturas = $db->getAsignaturaProfesor($_SESSION['user']);
    ?>
  </head>
  <body>
    <?php include_once("Menu.php") ?>
    <div class="container">
      <h1 class="col-md-4">Asignaturas</h1>
      <div class="clearfix"></div>
      <div class="alert alert-warning col-md-8" id="alertDelete" style="display: none">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>¡AVISO!</strong> Asignatura eliminada correctamente.
      </div>
      <a href="AsignaturasFrm.php" name="button" class="btn btn-primary pull-right col-md-3" style="margin: 2%;">Nuevo</a>
      <div class="clearfix"></div>
      <div class="table-responsive">
        <table class="table table-condensed table-striped table-hover" id="tblAsignaturas">
          <thead>
            <tr>
              <th style="display:none;"></th>
              <th>Grupo</th>
              <th>Materia</th>
              <th>Unidades</th>
              <th>L</th>
              <th>M</th>
              <th>X</th>
              <th>J</th>
              <th>V</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(!is_null($asignaturas)) {
              foreach ($asignaturas as $asignatura) {
                $dias = array("lunes", "martes", "miércoles", "jueves", "viernes");
                $unidades = $db->countUnidades($asignatura->id);
            ?>
            <tr>
              <th class="asignatura" style="display: none;"><?php echo $asignatura->id; ?></th>
              <th><?php echo $asignatura->idgrupo ?></th>
              <th><?php echo $asignatura->materia ?></th>
              <th><?php if(!is_null($unidades)) { echo $unidades[0]->numero; } else { echo "0"; } ?></th>
              <?php foreach ($dias as $dia): ?>
                <th><?php if($db->compruebaDia($asignatura->id, $dia)){ echo "X"; } ?></th>
              <?php endforeach ?>
              <th><a href="">
  								<img src="../../image/icons/edit.png"
  								onmouseover="this.src='../../image/icons/editcolor.png'"
  								onmouseout="this.src='../../image/icons/edit.png'">
  						</a></th>
              <th class="delete"><a>
								<img src="../../image/icons/delete.png"
								onmouseover="this.src='../../image/icons/deletecolor.png'"
								onmouseout="this.src='../../image/icons/delete.png'">
							</a></th>
            </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="../../model/asignaturas2.js"></script>
  </body>
</html>
