(function () {
    'use strict';

    var jq = function () {
        $(function () {

            $('#datatable').DataTable({
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
                        data: 'posicao'
                    },
                    {
                        data: 'piloto'
                    },
                    {
                        data: 'navegador'
                    },
                    {
                        data: 'viatura'
                    },
                    {
                        data: 'partida'
                    },
                    {
                        data: 't1'
                    },
                    {
                        data: 't2'
                    },
                    {
                        data: 'final'
                    }
                ]
            });
        });
    };


    jq();

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    $('#myModal').modal(options);

})();