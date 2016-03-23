<?php
  require_once("../../model/DAOgm.php");
  $tblAsignaturas = new DAOgm();
  $materias = $tblAsignaturas->getMateriasPorCarrera($_POST['carrera']);
  $grupos = $tblAsignaturas->getGruposPorCarrera($_POST['carrera']);
  $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes");
?>

  <div class="form-group" id="divMateria">
    <label for="materia">Seleccione la materia:</label>
    <select class="form-control selectAsignatura" name="materia" id="materia">
      <option value="0">Seleccione una opción</option>
      <?php foreach ($materias as $materia): ?>
        <option value="<?php echo $materia->clave ?>"><?php echo $materia->descripcion ?></option>
      <?php endforeach; ?>
        <option value="0">Otra</option>
    </select>
  </div>

  <div class="form-group" id="divGrupo">
    <label for="grupo">Seleccione el grupo:</label>
    <select class="form-control selectAsignatura" name="grupo" id="grupo">
      <option value="0">Seleccione una opción</option>
      <?php foreach ($grupos as $grupo): ?>
        <option value="<?php echo $grupo->grupo; ?>"><?php echo $grupo->grupo; ?></option>
      <?php endforeach; ?>
      <option value="0">Otra</option>
    </select>
  </div>

  <div class="form-group">
    <label for="unidades">¿Cuantas unidades tendrá la asignatura?</label>
    <select class="form-control selectAsignatura" name="unidades" id="unidades">
<?php for($i=0; $i<10; $i++) { ?>
      <option><?php echo $i+1; ?></option>
<?php } ?>
    </select>
  </div>

  <label for="">Días:</label>
  <br/>
<?php for($i=0; $i<5; $i++) { ?>
  <div class="checkbox-inline">
    <label>
      <input type="checkbox" name="dias[]" value="<?php echo mb_strtolower($dias[$i], 'UTF-8') ?>"><?php echo $dias[$i] ?>
    </label>
  </div>
<?php } ?>

  <button type="submit" class="btn btn-primary pull-right" disabled="true" id="btnSaveAsignatura">Guardar</button>
</form>

<div class="modal fade" id="modalMateria" data-backdrop="static" data-keyboard="false">
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

          <button class="btn btn-primary pull-right" onclick="saveMateria()">Guardar Materia</button>
        </form>
        <button type="button" class="btn btn-warning pull-left" id="btnCerrarFrmMateria" data-dismiss="modal">Cancelar</button>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalGrupo" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Crear Grupo</h4>
      </div>
      <div class="modal-body">
        <form class="frmAjax" id="frmGrupo" onsubmit="return false">
        
          <div class="form-group">
            <label for="">Grupo:</label>
            <input type="text" class="form-control" id="grpClave" placeholder="Ej. SI52">
          </div>
          <div class="form-group">
            <label for="salon">Salón:</label>
            <input type="text" class="form-control" id="grpSalon" placeholder="Ej. H126">
          </div>

          <div class="form-group">
            <label for="horario">Horario:</label>
            <select name="horario" id="grpHorario" class="form-control">
              <option value="matutino">Matutino</option>
              <option value="vespertino">Vespertino</option>
            </select>
          </div>
        
          <button type="button" class="btn btn-primary pull-right" onclick="saveGrupo()">Guardar</button>
        </form>
        <button type="button" class="btn btn-warning pull-left" id="btnCerrarFrmGrupo" data-dismiss="modal">Cancelar</button>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>