<?php 
	$carrera = $_GET['codigo'];
	include_once("../model/DAOgm.php");
	$db = new DAOgm();
	$grupos = $db->getGruposPorCarrera($carrera);
	$materias = $db->getMateriasPorCarrera($carrera);
	$profesores = $db->getProfesores();
	if (empty($grupos)) {
?>  
	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen grupos asignados a esta carrera. Asigna uno <a href="#" onclick="enlace(<?php echo $carrera ?>)">aquí</a>.
	</div>
<?php
	} elseif(empty($materias)) { ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen materias asignadas a esta carrera.
	</div>

<?php } elseif (empty($profesores)) { ?>
	<div class="alert alert-warning">
		<button class="close" data-dismiss="alert"><span>&times;</span></button>
		No existen profesores asignados a esta carrera.
	</div>
<?php } else { ?>

	<div id="Part2"></div>
	<div class="form-group">
		<select name="grupos" id="grupos" class="form-control">
			<?php 
				foreach ($grupos as $grupo) {
					echo "<option>$grupo->grupo</option>";
				}
			?>	
		</select>
	</div>
	<div class="form-group">
		<select name="materia" id="materia" class="form-control">
			<?php  
				foreach ($materias as $materia) {
					echo "<option value='$materia->clave'>$materia->descripcion</option>";
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<select name="profesor" id="profesor" class="form-control">
			<?php 
				foreach ($profesores as $profesor) {
					echo "<option value='$profesor->matricula'>$profesor->nombres $profesor->paterno $profesor->materno</option>";
				}
			?>
		</select>
	</div>
	<div class="group">
		<div class="checkbox col-md-2">
			<label>
				<input type="checkbox" name="dias[]" value="lunes">Lunes
			</label>
		</div>
	</div>
	<div class="group">
		<div class="checkbox col-md-2">
			<label>
				<input type="checkbox" name="dias[]" value="martes">Martes
			</label>
		</div>
	</div>
	<div class="group">
		<div class="checkbox col-md-2">
			<label>
				<input type="checkbox" name="dias[]" value="miércoles">Miércoles
			</label>
		</div>
	</div>
	<div class="group">
		<div class="checkbox col-md-2">
			<label>
				<input type="checkbox" name="dias[]" value="jueves">Jueves
			</label>
		</div>
	</div>
	<div class="group">
		<div class="checkbox col-md-2">
			<label>
				<input type="checkbox" name="dias[]" value="viernes">Viernes
			</label>
		</div>
	</div>
	<div class="group">
		<button class="btn btn-primary pull-right">Enviar</button>
	</div>
	<script src="../model/gm-ajax.js"></script>
<?php } ?>