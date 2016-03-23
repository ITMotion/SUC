$(document).ready(function() {
	$("#tblAsignaturas").dataTable({
		"aoColumnDefs": [
		//para que no use las columnas donde se muestran los botones
	    	{ "bSortable": false, "aTargets": [ 0, 9, 10 ] }, 
	    	{ "bSearchable": false, "aTargets": [ 0, 9, 10 ] } 
    	],
    	"language": {
    		"sInfoFiltered": "(filtrado de un total de _MAX_ asignaturas)",
    		"sInfo": "",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sLoadingRecords": "Cargando...",
    		"sLengthMenu": "Mostrar _MENU_ asignaturas",
    		"sSearch": "Buscar:",
    		"oPaginate": {
    			"sFirst": "Primero",
    			"sLast" : "Último",
    			"sNext" : "Siguiente",
    			"sPrevious" : "Anterior"
    		}
    	},
	});
});