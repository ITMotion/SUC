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

  $("#Part2").on("change", "#materia", function(e){
    if ($(this).val() == 0) {
      $("#modalMateria").modal("toggle");
    }
  });

  $("#Part2").on("change", "#grupo", function(e){
    if ($(this).val() == 0) {
      $("#modalGrupo").modal("toggle");
    }
  });

/*
* Si cierra el modal las opciones seleccionadas se reinician.
*/
  $("#Part2").on("click", "#btnCerrarFrmMateria",function() {
    $("#materia option").prop('selected', false);
  });

  $("#Part2").on("click", "#btnCerrarFrmGrupo",function() {
    $("#grupo option").prop('selected', false);
  });

/*
  Evento para validar que las opciones seleccionadas sean validas
*/
  $("#Part2").on("change", ".selectAsignatura", function(e) {
    validarSelect();
  });
});

//Función que valida que los tres select principales sean válidos para desbloquear el botón
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
      url: "../../model/Profesor/crearMateria.php",
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
      validarSelect();
    });
  }
}

function saveGrupo() {
  var form = document.getElementById('frmGrupo');
  if (form.checkValidity()) {
    var grpClave = $('#grpClave').val();
    var grpSalon = $('#grpSalon').val();
    var grpHorario = $('#grpHorario').val();
    var carrera = $("#carrera").val();
    console.log("Clave:"+grpClave+" Salón:"+grpSalon+" Horario:"+grpHorario+" Carrera:"+carrera);
    $.ajax({
      url: "../../model/Profesor/crearGrupo.php",
      type: "POST",
      dataType: "HTML",
      data: {
        grpClave: grpClave,
        grpSalon: grpSalon,
        grpHorario: grpHorario,
        carrera: carrera
      }
    }).done(function(data) {
      var SG = $('#grupo');
      SG.append('<option selected="selected">'+grpClave+'</option>');
      $('#modalGrupo').modal('toggle');
      validarSelect();
    });
  }
}