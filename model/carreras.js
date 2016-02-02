function deleteCarreras(codigo) {
    if (confirm("¿Seguro que deseas eliminar la carrera?")) {
        window.location = "CarrerasDelete.php?codigo="+codigo;
    };
}