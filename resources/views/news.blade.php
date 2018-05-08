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
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('tempos')}}">Tempos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('noticias')}}">Noticias</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adminBoard')}}">Administrador</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-4">--}}
{{--<div class="dropdown">--}}
{{--<button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Todas os eventos...</button>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="#"><span class="glyphicon glyphicon-comment"></span> Noticias</a></li>--}}
{{--<li><a href="#"><span class="glyphicon glyphicon-info-sign"></span>Informações</a></li>--}}
{{--<li><a href="#"><span class="glyphicon glyphicon-time"></span> Tempos</a></li>--}}
{{--<li><a href="#"><span class="glyphicon glyphicon-warning-sign"></span> Acidentes</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

<div class="container col-lg-7" style="padding-top: 70px">
    <div style="margin-top: 1%">

        <div class="form-group">
            <label for="exampleSelect"><strong>Tipo de Noticia</strong></label>
            <select class="form-control col-lg-3" id="exampleSelect">
                <option value="0" selected>Todos</option>
                @foreach($tiposNoticia as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                @endforeach
            </select>
        </div>

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

