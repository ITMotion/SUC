<?php
  require_once("../../model/DAOgm.php");
  $tblAsignaturas = new DAOgm();
  $materias = $tblAsignaturas->getMateriasPorCarrera($_POST['carrera']);
  $grupos = $tblAsignaturas->getGruposPorCarrera($_POST['carrera']);
?>

  <div class="form-group" id="divMateria">
    <label for="materia">Seleccione la materia:</label>
    <select class="form-control" name="materia" id="materia">
      <option value="0">Seleccione una opción</option>
      <?php foreach ($materias as $materia): ?>
        <option value="<?php echo $materia->clave ?>"><?php echo $materia->descripcion ?></option>
      <?php endforeach; ?>
        <option value="0">Otra</option>
    </select>
  </div>

  <div class="form-group" id="grupo">
    <label for="grupo">Seleccione el grupo:</label>
    <select class="form-control" name="grupo" id="selectGrupo">
      <?php foreach ($grupos as $grupo): ?>
        <option><?php echo $grupo->grupo ?></option>
      <?php endforeach; ?>
      <option>Otra</option>
    </select>
  </div>

</form>
<div id="respuesta"></div>

<div class="modal fade" id="modalMateria">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Crear Materia</h4>
      </div>
      <div class="modal-body">
        <form id="frmMateria" class="frmAjax" onsubmit="return false">
          <div class="form-group">
            <label for="descripcion">Ingrese el nombre de la materia:</label>
            <input type="text" name="descripcion" class="form-control" required id="matDescripcion">
          </div>

          <div class="form-group">
            <label for="grado">Ingrese el grado al que aplica la materia:</label>
            <input type="number" name="grado" class="form-control" min="1" max="12" required id="matGrado">
          </div>

          <button class="btn btn-primary pull-right" onclick="validar()">Guardar Materia</button>
        </form>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>