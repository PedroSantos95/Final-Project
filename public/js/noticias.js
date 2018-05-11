(function () {
    'use strict';

    var table = $('#datatable').DataTable({
        responsive: true,
        "autoWidth": true,
        "language": {
            "sProcessing":   "A processar...",
            "sLengthMenu":   "Mostrar _MENU_ registos",
            "sZeroRecords":  "Não foram encontrados resultados",
            "sInfo":         "A mostrar de _START_ até _END_ de _TOTAL_ registos",
            "sInfoEmpty":    "A mostrar de 0 até 0 de 0 registos",
            "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
            "sInfoPostFix":  "",
            "sSearch":       "Procurar: ",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior ",
                "sNext":     " Seguinte",
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
                    let button = '<a data-toggle="modal" data-target="#mensagem" onclick="updateModalHeader(\'';
                    button = button + data.titulo;
                    button = button + '\'); updateModalInfo(\'';
                    button = button + data.informacao;
                    button = button + '\')"><img height="28" width="30"src="icons/loupe.png"></a>';
                    return button;
                }
            }
        ]
    });

    let radios = document.getElementsByClassName('selecao-tipo');
    for(let i=0; i<radios.length; i++){
        radios[i].addEventListener("click", function clickUpdate (){
            let tipo = radios[i].id;

            table.ajax.url('/api/news?tipo='+tipo);
            table.ajax.reload();
        });

    }
})();