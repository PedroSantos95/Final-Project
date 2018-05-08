(function () {
    'use strict';

    var table = $('#datatable').DataTable({
        "language": {
            "sProcessing":   "A processar...",
            "sLengthMenu":   "Mostrar _MENU_ registos",
            "sZeroRecords":  "Não foram encontrados resultados",
            "sInfo":         "A mostrar de _START_ até _END_ de _TOTAL_ registos",
            "sInfoEmpty":    "A mostrar de 0 até 0 de 0 registos",
            "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
            "sInfoPostFix":  "",
            "sSearch":       "Procurar:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Seguinte",
                "sLast":     "Último"
            }
        },
        ajax: {
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
            },
            url: '/api/news',
            dataSrc: ''
        },
        columns: [
            {
                data: null,
                render: function (data) {
                    return '<img src="icons/' + data.path + '" height="32" width="32">';
                }
            },
            {
                data: 'titulo'
            },
            {
                data: 'informacao'
            },
            {
                data: 'updated_at'
            },
            {
                data: null,
                render: function (data) {
                    let button = '<button data-toggle="modal" data-target="#mensagem" class="btn btn-info btn-sm" onclick="updateModalHeader(\'';
                    button = button + data.titulo;
                    button = button + '\'); updateModalInfo(\'';
                    button = button + data.informacao;
                    button = button + '\')"> Detalhes</button>';
                    return button;
                }
            }
        ]
    });

    var selectTipo = document.getElementById('exampleSelect');
    selectTipo.addEventListener("change", function updateTable () {
        let tipo = this.options[this.selectedIndex].value;

        table.ajax.url('/api/news?tipo='+tipo);
        table.ajax.reload();
    });



})();