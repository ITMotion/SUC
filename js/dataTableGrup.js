$(document).ready( function () { //esta función es para aplicar el plugin de dataTables a la tabla en mención, se aplica por el id
    $('#tblGrupos').dataTable({
    	"aoColumnDefs": [
    	{ "bSortable": false, "aTargets": [ 4, 5 ] }, //para que no use las columnas donde se encuentran los botones eliminar
    	{ "bSearchable": false, "aTargets": [4, 5] } //para que no use las columnas donde se encuentran los botones eliminar
    	],
    	"language": {
    		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    		"sInfo": "Del _START_ al _END_ de un total de _TOTAL_ materias",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sLoadingRecords": "Cargando...",
    		"sLengthMenu": "Mostrar _MENU_ materias",
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
