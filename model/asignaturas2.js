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
  
  $("form").submit(function(e) {
    e.preventDefault();
  });

  $("#Part2").on("change", "#materia", function(e){
    if ($(this).val() == 0) {
      $("#modalMateria").modal("toggle");
    }
  });

  $("#Part2").on("change", ".selectAsignatura", function(e) {
    validarSelect();
  });

});

function validarSelect() {
  if ($("#carrera").val() != 0 && $("#materia").val() != 0 && $("#grupo").val() != 0) {
    $("#btnSaveAsignatura").prop("disabled", false);
  } else {
    $("#btnSaveAsignatura").prop("disabled", true);
  }
}

function saveMateria() {
  var form = document.getElementById('frmMateria');
  if (form.checkValidity()) {
    var descripcion = $("#matDescripcion").val();
    var grado =  $("#matGrado").val();
    var carrera = $("#carrera").val();
    $.ajax({
      url: "../../model/Profesor/mat-crear.php",
      type: "POST",
      dataType: "json",
      data: {
        descripcion: descripcion,
        grado: grado,
        carrera: carrera
      }
    }).done(function(data) {
      var SM = $("#materia");
      SM.append('<option value="'+ data.id +'" selected="selected">'+descripcion+'</option>');
      $("#modalMateria").modal("toggle");
      $("#respuesta").html(data);
    });
  }
}

