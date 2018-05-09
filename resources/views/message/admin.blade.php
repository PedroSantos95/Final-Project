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
<div class="container col-lg-6" style="padding-top: 70px">
    <h3>Inserir uma mensagem</h3>
</div>
<div class="container col-lg-6">
    <form action="" method="POST">
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

        </div>
        <br>
        {{--<select class="form-control" name="tipo" style="height: 100%" required>--}}
        {{--<option value="" disabled selected>Selecione o tipo de noticia</option>--}}
        {{--<option value="noticias">Noticias</option>--}}
        {{--<option value="informacoes">Informações</option>--}}
        {{--<option value="tempos">Tempos</option>--}}
        {{--<option value="acidentes">Acidentes</option>--}}
        {{--</select>--}}
        <div class="form-group">
            <label for=""><strong>Titulo da Mensagem</strong></label>
            <input required type="text" class="form-control" name="titulo" placeholder="Titulo" maxlength="30">
        </div>
        <div class="form-group">
            <label for=""><strong>Mensagem</strong></label>
            <textarea required type="text" name="corpo" class="form-control" placeholder="Mensagem"
                      maxlength="255"></textarea>
        </div>
        {{ csrf_field() }}

        <input type="submit" class="btn btn-dark" onclick="functionAlert()" value="Submeter">
    </form>
</div>

<br>
<hr class="style-two">

<div class="container col-lg-10">
    <div style="margin-top: 1%">
        <table class="table table-striped table-bordered" id="datatable" cellspacing="0" style="width: 100%; table-layout: fixed">
            <thead>
            <tr>
                <th style="width: {{100/6}}%">Tipo</th>
                <th style="width: {{100/6}}%">Titulo</th>
                <th style="width: {{100/6}}%">Mensagem</th>
                <th style="width: {{100/6}}%">Data</th>
                <th style="width: {{100/18}}%">Visivel</th>
                <th style="width: {{100/5}}%">Ações</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Tipo</th>
                <th>Titulo</th>
                <th>Mensagem</th>
                <th>Data</th>
                <th>Visivel</th>
                <th>Ações</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach ($mensagens as $mensagem)
                <tr>

                    <td style="overflow: hidden">{{$mensagem->tipoNoticia->nome}}</td>
                    <td style="overflow: auto">{{$mensagem->titulo}}</td>
                    {{--<th>{{$mensagem->tipo_noticia}}</th>--}}
                    {{--<th><img src="icons/{{$mensagem->tipoNoticia->path_black}}" height="48" width="48"></th>--}}
                    <td style="overflow: auto">{{$mensagem->informacao}}</td>
                    <td style="overflow: hidden">{{$mensagem->created_at}}</td>
                    <td style="overflow: hidden">
                        @if($mensagem->visivel == true)
                            Sim
                        @endif
                        @if($mensagem->visivel == false)
                            Nao
                        @endif
                    </td>
                    <td style="overflow: hidden">
                        <button data-toggle="modal" data-target="#mensagem" class="btn btn-info btn-sm"
                                onclick="updateModalInfo('{{$mensagem->informacao}}'); updateModalHeader('{{$mensagem->titulo}}'); updateModalTipoNoticia('{{$mensagem->tipo_noticia_id}}');
                                        updateModalCreatedAt('{{$mensagem->created_at}}'); updateModalVisivel('{{$mensagem->visivel}}')">
                            Detalhes
                        </button>
                        <a class="btn btn-danger btn-sm"
                           href="{{route('eliminarMensagem', ['id' => $mensagem->id])}}">Eliminar</a>
                        <a class="btn btn-warning btn-sm"
                           href="{{route('editarMensagem', ['id' => $mensagem->id])}}">Editar</a>
                        @if($mensagem->visivel == true)
                            <a class="btn btn-primary btn-sm"
                               href="{{route('alterarEstadoMensagem', ['id' => $mensagem->id])}}">Esconder</a>
                        @endif
                        @if($mensagem->visivel == false)
                            <a class="btn btn-primary btn-sm"
                               href="{{route('alterarEstadoMensagem', ['id' => $mensagem->id])}}">Mostrar</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$mensagens->links()}}
    </div>

</div>
@endif

<!-- Modal -->
<div id="mensagem" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="word-wrap: break-word;">Titulo</h4>
            </div>
            <div class="modal-body">
                <p class="informacao_modal" style="word-wrap: break-word;">Informacao</p>
                <p class="modal-tipo" style="word-wrap: break-word;">Tipo Noticia</p>
                <p class="modal-visivel" style="word-wrap: break-word;">Visivel</p>
                <p class="modal-created_at" style="word-wrap: break-word;">Created_at</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<script>
    function updateModalInfo(informacao) {
        $('.informacao_modal').text("Texto da Noticia: " + informacao);
    }
</script>

<script>
    function updateModalHeader(titulo) {
        $('.modal-title').html("Titulo da Noticia: " + titulo);
    }
</script>

<script>
    function updateModalTipoNoticia(tipo) {
        if(tipo==1){
            $('.modal-tipo').html("Tipo de Noticia: Informações");
        }
        if(tipo==2){
            $('.modal-tipo').html("Tipo de Noticia: Noticias");
        }
        if(tipo==3){
            $('.modal-tipo').html("Tipo de Noticia: Acidentes");
        }
        if(tipo==4){
            $('.modal-tipo').html("Tipo de Noticia: Tempos");
        }
    }
</script>

<script>
    function functionAlert(){
        var w = alert("Noticia Criada com sucesso!");
        setTimeout(function () { w.close(); }, 1);
    }
</script>

<script>
    function updateModalCreatedAt(created_at) {
        $('.modal-created_at').html("Noticia criada: "+created_at);
    }
</script>

<script>
    function updateModalVisivel(visivel) {
        if(visivel == 1){
            $('.modal-visivel').html("A noticia não se encontra visivel para os utilizadores!");
        }
        if(visivel == 0){
            $('.modal-visivel').html("A noticia encontra-se visivel para os utilizadores!");
        }
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