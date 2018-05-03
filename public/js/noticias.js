(function () {
    'use strict';

    var table = $('#datatable').DataTable({
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
                    return '<img src="icons/' + data.path + '" height="48" width="48">';
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