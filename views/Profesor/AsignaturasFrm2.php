<?php
  require_once("../../model/DAOgm.php");
  $tblAsignaturas = new DAOgm();
  $materias = $tblAsignaturas->getMateriasPorCarrera($_POST['carrera']);
  $grupos = $tblAsignaturas->getGruposPorCarrera($_POST['carrera']);
?>
<div class="form-group" id="materia">
  <label for="materia">Seleccione la materia:</label>
  <select class="form-control" name="materia">
    <?php foreach ($materias as $materia): ?>
      <option value=""><?php echo $materia->descripcion ?></option>
    <?php endforeach; ?>
      <option>Otra</option>
  </select>
</div>
<div class="form-group" id="grupo">
  <label for="grupo">Seleccione el grupo:</label>
  <select class="form-control" name="grupo">
    <?php foreach ($grupos as $grupo): ?>
      <option><?php echo $grupo->grupo ?></option>
    <?php endforeach; ?>
    <option>Otra</option>
  </select>
</div>
