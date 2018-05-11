<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" content="no-cache">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <title>Pagina Administrador</title>
    <style>
        hr.style-two {
            border: 0;
            height: 1px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
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

@if(Auth::check())
    <div class="container col-lg-6" style="padding-top: 80px;text-align: center; padding-bottom: 20px;">
        <h3>Editar mensagem | Admin</h3>
    </div>
    <div class="container col-lg-6">
        <form method="POST" action="{{route('guardarMensagem' , ['id' => $mensagem->id])}}">
            <div style="text-align: left">
                <label><strong>Tipo de noticia:</strong></label><br>
                <div style="text-align: left" class="btn-group btn-group-toggle" data-toggle="buttons">
                    @for ($i = 0; $i <sizeof($tiposNoticia); $i++)
                        <label class="btn btn-outline-info    {{ $tiposNoticia[$i]->id == $mensagem->tipo_noticia_id ? 'active' : '' }}">
                            <input type="radio" name="tipo" value="{{$tiposNoticia[$i]->id}}" autocomplete="off"
                                    {{ $i == 0 ? 'checked' : '' }}>
                            <img src="/icons/{{$tiposNoticia[$i]->path_black}}" height="32" width="32">
                            {{$tiposNoticia[$i]->nome}}
                        </label>
                    @endfor
                </div>

            </div>
            <br>

            <div class="form-group" style="text-align: left">
                <label for=""><strong>Titulo da Mensagem:</strong></label>
                <input required value="{{$mensagem->titulo}}" type="text" class="form-control" name="titulo" placeholder="Titulo" maxlength="30">

            </div>
            <div class="form-group" style="text-align: left;">
                <label for=""><strong>Mensagem:</strong></label>
                <textarea required type="text" name="corpo" class="form-control" placeholder="Mensagem"
                          maxlength="255">{{$mensagem->informacao}}</textarea>
            </div>
            {{ csrf_field() }}
                <input type="submit" class="btn btn-outline-info" value="Ok" onclick="functionAlert()" >
                <a href="/admin" class="btn btn-outline-danger" >Cancelar</a>
        </form>
    </div>

    <br>
    <hr class="style-two">

@endif

<div id="mensagem" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="word-wrap: break-word;">Titulo</h4>
            </div>
            <div class="modal-body">
                <p class="informacao_modal" style="word-wrap: break-word;">Nao Titulo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    function functionAlert(){
        var w = alert("Noticia Alterada com sucesso!");
        setTimeout(function () { w.close(); }, 1);
    }
</script>

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

<script>
    function alterarEstadoMensagem(estadoMensagem) {
        if (estadoMensagem == true) {
            estadoMensagem = false;
        } else {
            estadoMensagem = true;
        }
    }
</script>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="/js/mensagens.js"></script>

</body>