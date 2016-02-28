<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php require_once("../../model/SesionProfesor.php"); ?> <!--Contról de Sesiones-->
    <title>SUC: Sistema Único de Calificaciones - Asignaturas</title>
    <!-----------------------Recursos de Bootstrap-------------------------->
  	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
  	<script src="../../js/bootstrap.min.js"></script>
  	<script src="../../js/scripts.js"></script>
  	<!--------------------------Fin recursos de bootstrap-------------------------->
    <?php
      include_once("../../model/DAOgm.php");
      $tblAsignaturas = new DAOgm();
      $asignaturas = $tblAsignaturas->getAsignaturaProfesor($_SESSION['user']);
    ?>
  </head>
  <body>
    <?php include_once("Menu.php") ?>
    <div class="container">
      <h1 class="col-md-4">Asignaturas</h1>
      <a href="AsignaturasFrm.php" name="button" class="btn btn-primary pull-right" style="width: 20%; margin: 2%;">Nuevo</a>
      <div class="clearfix"></div>
      <div class="table-responsive">
        <table class="table table-condensed table-striped table-hover" id="tblAsignaturas">
          <thead>
            <tr>
              <th>Grupo</th>
              <th>Materia</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(!is_null($asignaturas)) {
              foreach ($asignaturas as $asignatura) {
            ?>
            <tr>
              <td></td>
              <td></td>
              <td><a href="">
  								<img src="../../image/icons/edit.png"
  								onmouseover="this.src='../../image/icons/editcolor.png'"
  								onmouseout="this.src='../../image/icons/edit.png'">
  						</a></td>
              <td><a>
								<img src="../../image/icons/delete.png"
								onmouseover="this.src='../../image/icons/deletecolor.png'"
								onmouseout="this.src='../../image/icons/delete.png'">
							</a></td>
            </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="../../asignaturas2.js"></script>
  </body>
</html>
