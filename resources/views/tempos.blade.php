<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <title>Rally Sernancelhe Aguiar da Beira</title>

</head>

<body>


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Tempos Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('temposSemReferencia')}}">Tempos</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('noticias')}}">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adminBoard')}}">Administrador</a>
                </li>
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container" id="app">
    <div class="row">

        <div class="col-sm-4 col-sm-offset-4 col-lg-12">
            <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-top: 8%;">

            </div>

        </div>
        <table style="width:100%" id="tabelaTempos">
            <tr>
                <th>Numero Carro</th>
                <th>Tempo Partida</th>
                @for($i=1; $i<=$numeroTemposIntermedios; $i++)
                    <th>Tempo Intermedio <?= $i ?></th>
                @endfor
                <th>Tempo Chegada</th>
            </tr>
            <tr v-for="(value, index) in temposFinais">
                <td>@{{ value.numero_carro }}</td>
                <td>@{{ value.tempoPartida | formatDate }}</td>
                <td v-for="index2 in numeroTemposIntermedios">
                    <span v-if="index != 0">@{{ getNameField(value, index2) }}</span>
                    <span v-if="index == 0">@{{ getCarRefTimes(value, index2)}}</span>
                </td>
                <td>@{{ value.tempoChegada }}</td>
            </tr>

        </table>
    </div>
    <div>
    </div>

</div>

<!-- Bootstrap core JavaScript -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/temposintermedios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>

<script>
    new Vue({
        el: '#app',
        data: {
            tempos: [],
            teste: [],
            temposFinais: [],
            carroSelected: '',
            numeroTemposIntermedios: ''
        },
        created() {
            this.fetchTimes();
        },
        methods: {
            fetchTimes() {
                axios.get('/teste').then(response => {
                    this.numeroTemposIntermedios = response.data.numeroTemposIntermedios;
                    this.tempos = response.data.tempos;
                    this.teste = response.data.tempos[0];
                    this.formatArray();
                }).catch(error => {
                    console.log(error);
                })
            },

            formatArray() {
                var counter = 0;
                var newElement = {};
                var previousElement;
                for (var carroRef in this.tempos) {
                    newElement.numero_carro = this.tempos[carroRef].numero_carro;
                    newElement.tempoPartida = this.tempos[carroRef].tempoPartida;
                    newElement.tempoChegada = this.tempos[carroRef].tempoChegada;
                    for (var value in this.tempos[carroRef]) {
                        if (value.indexOf('Intermedio') !== -1) {
                            if (counter > 1 && previousElement !== undefined) {
                                newElement[value] = this.calculateDiffDates(this.tempos[carroRef][value], this.tempos[carroRef].tempoPartida);
                                previousElement = value;
                            } else {
                                newElement[value] = this.calculateDiffDates(this.tempos[carroRef][value], this.tempos[carroRef].tempoPartida);
                                previousElement = value;
                            }
                        } else {
                            if (value.indexOf('Chegada') !== -1) {
                                newElement[value] = this.calculateDiffDates(this.tempos[carroRef][value], this.tempos[carroRef].tempoPartida);
                            }
                        }
                        counter++;
                    }
                    this.temposFinais.push(newElement);
                    newElement = {};
                }
            },

            getNameField(value, index){
                return this.calculateDiffTimes(this.temposFinais[0]['tempoIntermedio_'+index], value['tempoIntermedio_'+index]);
            },

            getCarRefTimes(value, index){
                return value['tempoIntermedio_'+index];
            },

            calculateDiffTimes(date1, date2) {
                if (date1 != null && date2 != null) {
                    date1 = moment(date1, 'mm:ss:ms');
                    date2 = moment(date2, 'mm:ss:ms');

                    var duration = date1.diff(date2);
                    var result = moment.duration(duration);

                    if(result.minutes() == 0){
                        return result.seconds() + '.' + result.milliseconds() + 's';
                    }
                    return result.minutes() + ':' + result.seconds() + '.' + result.milliseconds();
                }else{
                    return '--';
                }
            },

            calculateDiffDates(date1, date2) {
                if (date1 != null) {
                    date1 = moment(date1, 'YY-mm-dd HH:mm:ss:ms');
                    date2 = moment(date2, 'YY-mm-dd HH:mm:ss:ms');

                    var duration = date1.diff(date2);
                    var result = moment.duration(duration);

                    return result.minutes() + ':' + result.seconds() + '.' + result.milliseconds();
                }
            },
        },

        filters: {
            formatDate(data) {
                return data.toString().split(' ')[1] != null ? data.toString().split(' ')[1] : data;
            },

            formatTime(data, dataAnterior) {
                dataAnterior = dataAnterior.toString().split(' ')[1] != null ? dataAnterior.toString().split(' ')[1] : dataAnterior;
                return moment(dataAnterior, 'hh:mm:ss').diff(moment(data, 'hh:mm:ss'));
            },
        }
    });
</script>

</body>

</html>
