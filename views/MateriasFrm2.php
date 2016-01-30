<?php  
	$unidades = $_GET["unidades"];
	for ($i=0; $i < $unidades; $i++) { 
?>
<script>
  $(function() {
    $( "#datepicker<?php echo $i ?>" ).datepicker();
    $( "#datepicker<?php echo $i ?>" ).datepicker();
  });
  </script>
<div class="col-md-5">
	<div class="form-group">
			<input type="text" id="startUnidad<?php echo $i ?>" class="form-control">
	</div>
</div>
<div class="col-md-2"></div>
<div class="col-md-5">
	<div class="form-group">
		<input type="text" id="endUnidad<?php echo $i ?>" class="form-control">
	</div>
</div>
<?php
	}
?>
<button class="btn btn-primary pull-right col-md-2">Guardar</button>
<button class="btn btn-warning col-md-2">Cancelar</button>