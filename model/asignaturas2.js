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
    console.log("Seleccionado");
    if ($(this).val() == 0) {
      $("#modalMateria").modal("toggle");
    }
  });
  
  $("form").submit(function(event){
    event.preventDefault();
  })

  $("#Part2").on("success.form.fv", ".frmMateria", function(e) {
    alert("Hola!");
  })

});

