(function () {
    'use strict';

    var jq = function () {
        $(function () {

            $('#datatable').DataTable({
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
                    url: '/api/tempos',
                    dataSrc: ''
                },
                columns: [
                    {
                        data: 'numero_carro'
                    },
                    {
                        data: 'tempoPartida'
                    },
                    {
                        data: 'tempoIntermedio_1'
                    },
                    {
                        data: 'tempoIntermedio_2'
                    },
                    {
                        data: 'tempoIntermedio_3'
                    },
                    {
                        data: 'tempoIntermedio_4'
                    },
                    {
                        data: 'tempoIntermedio_5'
                    },
                    {
                        data: 'tempoIntermedio_6'
                    },
                    {
                        data: 'tempoIntermedio_7'
                    },
                    {
                        data: 'tempoIntermedio_8'
                    },
                    {
                        data: 'tempoIntermedio_9'
                    },
                    {
                        data: 'tempoIntermedio_10'
                    },
                    {
                        data: 'tempoChegada'
                    }
                ]
            });
        });
    };


    jq();

})();