(function () {
    'use strict';

    var table = $('#datatable').DataTable({
        "bInfo" : false,
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
            url: '/api/admin',
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
                data: null,
                render: function (data) {
                    return '<div style="max-width: 150px; word-wrap: break-word">'+ data.titulo +'</div>'
                }
            },
            {
                className: "one",
                data: null,
                render: function (data) {
                    return '<div style="max-width: 380px; word-wrap: break-word">'+ data.informacao +'</div>'
                }
            },
            {
                className: "one",
                data:null,
                render: function (data) {
                    return '<div>'+ data.updated_at +'</div>'
                }
                // data: 'updated_at'
            },
            {
                className: "one",
                data:null,
                render: function (data) {
                    return '<div>'+ data.visivelBonito +'</div>'
                }
                // data: 'updated_at'
            },
            {
                data: null,
                render: function (data) {
                    let modal = '<a style="padding-right:10px" data-toggle="modal" style="text-align:center" data-target="#mensagem" onclick="updateModalHeader(\'';
                    modal = modal + data.titulo + '\',\'' + data.path;
                    modal = modal + '\'); updateModalInfo(\'';
                    modal = modal + data.informacao;
                    modal = modal + '\'); updateModalCreatedAt(\'';
                    modal = modal + data.updated_at;
                    modal = modal + '\'); updateModalVisivel(\'';
                    modal = modal + data.visivel;
                    modal = modal + '\') "><img height="28" width="30" src="icons/loupe.png"></a>';
                    
                    let edit = '<a style="padding-right: 10px" href="';
                    edit = edit + '/admin/' + data.id + '/editarMensagem';
                    edit = edit + '"><img height="25" width="25" src="icons/edit.png"></a>';

                    let eliminate = '<a onclick="return confirm(\'Deseja eliminar a noticia selecionada??\');" style="padding-right: 10px" href="';
                    eliminate = eliminate + '/admin/'+ data.id +'/eliminarMensagem';
                    eliminate = eliminate + '"><img height="25" width="25" src="icons/cancel.png"></a>';

                    let visibility = '<a style="padding-right: 10px" href="';
                    visibility = visibility + '/admin/'+ data.id +'/alterarEstado';
                    visibility = visibility + '"><img height="32" width="32"src="';


                    if(data.visivel == 1) {
                        visibility = visibility + 'icons/hide.png">'
                    }else{
                        visibility = visibility + 'icons/view.png">'
                    }
                    visibility = visibility + '</a>';

                    return modal+edit+eliminate+visibility;
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