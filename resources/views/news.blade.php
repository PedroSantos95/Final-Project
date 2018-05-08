<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rally Sernancelhe Aguiar da Beira</title>

    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .custom-datatable {
            width: 100%;
            table-layout: fixed;
        }

        .custom-datatable td {
            overflow: auto;
        }
    </style>


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
                    <a class="nav-link" href="{{route('tempos')}}">Tempos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('noticias')}}">Noticias</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('adminBoard')}}">Administrador</a>
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

<div class="container col-lg-7" style="padding-top: 70px; padding-bottom: 20px">
    <div style="margin-top: 1%">

        <div>
            <label><strong>Tipo de noticia</strong></label><br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                @for ($i = 0; $i <sizeof($tiposNoticia); $i++)
                    <label class="btn btn-dark    {{ $i == 0 ? 'active' : '' }}">
                        <input type="radio" name="tipo" value="{{$tiposNoticia[$i]->id}}" autocomplete="off"
                                {{ $i == 0 ? 'checked' : '' }}>
                        <img src="icons/{{$tiposNoticia[$i]->path_white}}" height="32" width="32">
                        {{$tiposNoticia[$i]->nome}}
                    </label>
                @endfor
            </div>
<br>
        <table class="table table-striped table-bordered custom-datatable" id="datatable" cellspacing="0">
            <thead>
            <tr>
                <th style="width: {{100/5}}%">Tipo</th>
                <th style="width: {{100/5}}%">Titulo</th>
                <th style="width: {{100/5}}%">Mensagem</th>
                <th style="width: {{100/5}}%">Data</th>
                <th style="width: {{100/5}}%">Ações</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Tipo</th>
                <th>Titulo</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </tfoot>
            <tbody>
            {{--@foreach ($mensagens as $mensagem)--}}
            {{--@if($mensagem->visivel == true)--}}
            {{--<tr>--}}
            {{--<th><img src="icons/{{$mensagem->tipoNoticia->path_black}}" height="48" width="48"></th>--}}
            {{--<th>{{$mensagem->titulo}}</th>--}}
            {{--<th>{{$mensagem->informacao}}</th>--}}
            {{--<th>{{$mensagem->created_at}}</th>--}}
            {{--<th>--}}
            {{--<button data-toggle="modal" data-target="#mensagem" class="btn btn-info"--}}
            {{--onclick="updateModalInfo('{{$mensagem->informacao}}'); updateModalHeader('{{$mensagem->titulo}}')">--}}
            {{--Detalhes--}}
            {{--</button>--}}
            {{--</th>--}}
            {{--</tr>--}}
            {{--@endif--}}
            {{--@endforeach--}}
            </tbody>
        </table>
    </div>
</div>
</div>

</body>


<!-- Modal -->
<div id="mensagem" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modal-title" class="modal-title" style="word-wrap: break-word;">Titulo</h4>
            </div>
            <div class="modal-body">
                <p id="informacao-modal" class="informacao_modal" style="word-wrap: break-word;">Nao Titulo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


{{--<script>--}}
{{--function updateModalInfo(informacao) {--}}
{{--$('.informacao_modal').text(informacao);--}}
{{--}--}}
{{--</script>--}}

{{--<script>--}}
{{--function updateModalHeader(titulo) {--}}
{{--$('.modal-title').html(titulo);--}}
{{--}--}}
{{--</script>--}}


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>



<script>
    function updateModalInfo(string) {
        console.log(string);
        document.getElementById('informacao-modal').innerText = string;
    }

    function updateModalHeader(string) {
        console.log(string);
        document.getElementById('modal-title').innerText = string;
    }
</script>

{{--<script type="text/javascript" charset="utf8"--}}
{{--src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>--}}
<script src="/js/noticias.js"></script>

