$(document).ready( function () { //esta función es para aplicar el plugin de dataTables a la tabla en mención, se aplica por el id
    $('#tblGM').dataTable({
    	"aoColumnDefs": [
    	{ "bSortable": false, "aTargets": [ 1, 2 ] }, //para que no use las columnas donde se encuentran los botones eliminar
    	{ "bSearchable": false, "aTargets": [ 1, 2] } //para que no use las columnas donde se encuentran los botones eliminar
    	],
    	"language": {
    		"sInfoFiltered": "(filtrado de un total de _MAX_ alumnos)",
    		"sInfo": "Del _START_ al _END_ de un total de _TOTAL_ alumnos",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sLoadingRecords": "Cargando...",
    		"sLengthMenu": "Mostrar _MENU_ alumnos",
    		"sSearch": "Buscar:",
    		"oPaginate": {
    			"sFirst": "Primero",
    			"sLast" : "Último",
    			"sNext" : "Siguiente",
    			"sPrevious" : "Anterior"
    		}
    	}
    });
} );