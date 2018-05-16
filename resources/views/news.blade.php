<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" content="no-cache">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <title>Noticias</title>
    <style type="text/css">
        a:hover {
            cursor: pointer;
        }

        table {
            width: 50%;
        }

        @media only screen and (max-width: 900px) {
            .one {
                display: none;
            }
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
                    <a class="nav-link active" href="{{route('noticias')}}">Noticias</a>
                    <span class="sr-only">(current)</span>
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

<div class="container col-lg-6" style="padding-top: 80px;text-align: center;">
    <h3>Notícias</h3>
</div>
<div class="container col-lg-8" style="margin-top: 1%;">
    <div style="text-align: left;">
        <label><strong>Tipo de noticia:</strong></label><br>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-outline-info active">
                <div style="width: 110px" class="selecao-tipo" id="0">
                    <input id="type" type="radio" name="tipo" value="0" autocomplete="off"
                           checked><img src="icons/all_black.png" height="32" width="32"> Todos
                </div>
            </label>
            @for ($i = 0; $i <sizeof($tiposNoticia); $i++)
                <label class="btn btn-outline-info">
                    <div style="text-align: center; width: 110px;" class="selecao-tipo" id="{{$tiposNoticia[$i]->id}}">
                        <input id="type" type="radio" name="tipo" autocomplete="off">
                        <img src="icons/{{$tiposNoticia[$i]->path_black}}" height="32" width="32">
                        {{$tiposNoticia[$i]->nome}}
                    </div>
                </label>
            @endfor

        </div>
    </div>
</div>
<br>
<br>
<div class="container col-lg-8">
    <table class="table table-striped table-bordered custom-datatable display responsive"
           id="datatable" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th style="text-align: center;">Tipo</th>
            <th style="text-align: center;">Titulo</th>
            <th class="one" style="text-align: center;">Mensagem</th>
            <th class="one" style="text-align: center;">Data</th>
            <th style="table-layout: fixed">Detalhes</th>
        </tr>
        </thead>

        <tbody>

        </tbody>
    </table>

</div><!-- Modal -->
<div id="mensagem" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="word-wrap: break-word;">Titulo</h4>
            </div>
            <div class="modal-body" style="margin-bottom: -20px">
                <p>
                    <strong><span style="word-wrap: break-word;">Mensagem: </span></strong>
                    <br>
                    <span class="informacao_modal" style="word-wrap: break-word"></span>
                </p>
                <p style="float: right">
                    <strong><span style="word-wrap: break-word;"></span></strong>
                    <span class="modal-visivel" style="word-wrap: break-word"></span>
                </p>
                <div style="padding-bottom: -50px">
                    <p>
                        <span class="modal-created_at" style="word-wrap: break-word"></span>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>


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

<script>
    function updateModalInfo(informacao) {
        $('.informacao_modal').text(informacao);
    }
</script>


<script>
    function updateModalHeader(titulo, icon) {
        $('.modal-title').html(titulo + '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/' + icon + '" height="32" width="32">');

    }
</script>

<script>
    function updateModalCreatedAt(created_at) {
        $('.modal-created_at').html(created_at);
    }
</script>

<script src="/js/noticias.js"></script>


