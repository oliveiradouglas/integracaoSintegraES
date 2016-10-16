$('#cnpj').mask('99.999.999/9999-99');

$(document).ready(function(){
	$('#listagem').DataTable({
	    "language": {
	        "lengthMenu": "Exibir _MENU_",
	        "zeroRecords": "Nenhum registro encontrado.",
	        "info": "Exibindo _END_ de _TOTAL_ registros",
	        "infoEmpty": "Nennhum registro disponível",
	        "loadingRecords": "Carregando...",
			"processing":     "Processando...",
			"search":         "Pesquisar", 
			"paginate": {
				"first":      "Primeira",
				"last":       "Ultima",
				"next":       "Próxima",
				"previous":   "Anterior"
			},
	    },
	    "iDisplayStart": 0,
	});
});