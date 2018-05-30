(function () {
    'use strict';
    var url_string = window.location.href;
    var url = new URL(url_string);
    var id_rally = url.searchParams.get('id');

    var table = $('#datatable').DataTable({
        "bInfo" : false,
        "autoWidth":false,
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
            url: '/api/news?id='+ id_rally,
            dataSrc: ''
        },
        columnDefs: [
            { orderable: false, targets:[-1, -3, -4, -5] }
        ],
        columns: [
            {
                sWidth: '15%',
                data: null,
                render: function (data) {
                    return '<div style="text-align: center"><img src="icons/' + data.path + '" height="32" width="32"></div>';
                }
            },
            {
                data: null,
                render: function (data) {
                    return '<div style="width: 100%; word-wrap: break-word; text-align: left">'+ data.titulo +'</div>'
                }
            },
            {
                className: "one",
                data: null,
                render: function (data) {
                    return '<div style="max-width: 380px; word-wrap: break-word; text-align: left;">'+ data.informacao +'</div>'
                }
            },
            {
                sWidth: '17%',
                className: "one",
                data:null,
                render: function (data) {
                    return '<div style="text-align: center;">'+ data.updated_at +'</div>'
                }
                // data: 'updated_at'
            },
            {
                sWidth:'20%',
                data: null,
                render: function (data) {
                    let button = '<div style="text-align: center"><a data-keyboard="true" data-toggle="modal" style="text-align:center" data-target="#mensagem" onclick="updateModalHeader(\'';
                    button = button + data.titulo + '\',\'' + data.path;
                    button = button + '\'); updateModalInfo(\'';
                    button = button + data.informacao;
                    button = button + '\'); updateModalCreatedAt(\'';
                    button = button + data.updated_at;
                    button = button + '\') "><img alt="Detalhes da noticia" height="28" width="30" src="icons/loupe.png"></a></div>';
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