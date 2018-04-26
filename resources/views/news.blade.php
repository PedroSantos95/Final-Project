<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rally Sernancelhe Aguiar da Beira</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>


{{--<nav class="navbar navbar-inverse">--}}
{{--<div class="container-fluid">--}}
{{--<div class="navbar-header">--}}
{{--<a class="navbar-brand" href="#">Tempos Online</a>--}}
{{--</div>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li><a href="#"> Tempos</a></li>--}}
{{--<li><a href="#"> Quem Somos</a></li>--}}
{{--<li><a href="#"> Contatos</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Tempos Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-right ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Tempos
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quem Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contatos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Todas os eventos...</button>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="glyphicon glyphicon-comment"></span> Noticias</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span>Informações</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-time"></span> Tempos</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-warning-sign"></span> Acidentes</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container col-lg-6">
    <div style="margin-top: 1%">
        <table class="table table-striped table-bordered" id="datatable" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tfoot>
            @foreach ($mensagens as $mensagem)
                @if($mensagem->visivel == true)
                <tr>
                    <th>{{$mensagem->titulo}}</th>
                    <th>{{$mensagem->tipo_noticia}}</th>
                    <th>{{$mensagem->created_at}}</th>
                    <th><button data-toggle="modal" data-target="#mensagem" class="btn btn-info" onclick="updateModalInfo('{{$mensagem->informacao}}'); updateModalHeader('{{$mensagem->titulo}}')">Detalhes</button></th>
                </tr>
                @endif
            @endforeach
            </tfoot>
            <tbody>

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
                <h4 class="modal-title">Titulo</h4>
            </div>
            <div class="modal-body">
                <p class="informacao_modal">Nao Titulo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>
    function updateModalInfo(informacao) {
        $('.informacao_modal').text(informacao);
    }
</script>

<script>
    function updateModalHeader(titulo) {
        $('.modal-title').html(titulo);
    }
</script>
