$(document).ready(function() {
  $('#carrera').change(function() {
    if ($(this).val() == 0) {
      $("#Part2").empty();
    } else {
      $.ajax({
        url: "AsignaturasFrm2.php",
        type: "POST",
        dataType: "HTML",
        data:{
          carrera: $(this).val()
        }
      }).done(function(data){
        $('#Part2').html(data);
      })
    }
  });
  $("Part2").on("change", "#materia", function(e){
    if ($(this).val() == "Otra") {
      $(this).empty();
      $(this).append('
        <div class="form-group">
          <label for="materia">Seleccione la materia:</label>
          <input type="text" name="materia" value="" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="grado">Seleccione el grado:</label>
          <input type="number" name="grado" min="1" max="13" class="form-control" required>
        </div>
      ')
    }
  });
});
