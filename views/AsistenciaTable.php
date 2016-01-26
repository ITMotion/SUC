<?php 
	$grupo = $_GET['idGrupo'];
	$materia = $_GET['idMateria'];
	$fecha = $_GET['fecha'];
	include_once("../model/class.school.php");
	$db = new School();
	$infogrupo = $db->getGroup($grupo);
	$students = $db->getStudents($grupo);
	$calendar = $db->getCalendar($grupo, $materia, $fecha);
	$teacher = $db->getTeacher($grupo, $materia);
	$lista = $db->getList($grupo, $materia, $fecha);
?>
<div class="container">
	<p class="col-md-4">Materia: <?php echo $materia?></p>
	<p class="col-md-4">Grupo: <?php echo $grupo; ?></p>
	<p class="col-md-4">Maestro: <?php echo $teacher[0]->paterno." ".$teacher[0]->materno." ".$teacher[0]->nombres; ?></p>
	<p class="col-md-6">Salón: <?php echo $infogrupo[0]->salon; ?></p>
	<p class="col-md-6">Turno: <?php echo $infogrupo[0]->horario; ?></p>
</div>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover table-bordered" id="tblAS">
		<thead>
			<tr>
				<td>Matrícula</td>
				<td>Nombre</td>
				<?php 
				if ($calendar != null) {
					foreach ($calendar as $column) {
						echo "<td>".$column->fecha."</td>";
					}
				}
				else {
				?>
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert"><span>&times;</span></button>
						No existen resultados con esos valores de búsqueda. Intenta con otros filtros.
					</div>
				<?php 
				}
				?>
			</tr>
		</thead>	
		<tbody>
			<?php $j = 0; foreach ($students as $row) {?>
			<tr>
				<th><?php echo $row->matricula; ?> </th>
				<th><?php echo $row->paterno." ".$row->materno." ".$row->nombres; ?></th>
				<?php 
					foreach ($calendar as $prueba) {
						if($lista[$j]->asistencia == 1) {
							?>
							<th><input type="checkbox" id="prueba" checked onclick="updateAsistencia(0, '<?php echo $row->matricula; ?>', '<?php echo $prueba->fecha; ?>', '<?php echo $materia; ?>' )"</th>
							<?php 	
						} else {
							?>
							<th><input type="checkbox" id="prueba" onclick="updateAsistencia(1, '<?php echo $row->matricula; ?>', '<?php echo $prueba->fecha; ?>', '<?php echo $materia; ?>' )"</th>
							<?php 
						}
						$j++;
					}
				?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>