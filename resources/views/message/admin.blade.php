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
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">TemposOnline</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
</div>

<div class="container col-lg-6">
    <h3>Inserir uma mensagem</h3>
</div>
<div class="container col-lg-6">
    <form action="" method="POST">
            <div >
                <label><strong>Tipo de noticia</strong></label><br>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary active">
                            <input type="radio" name="tipo" value="noticias" autocomplete="off" checked><img src="icons/news.png" height="48" width="48">
                        Noticias
                    </label>
                    <label class="btn btn-primary">
                            <input type="radio" name="tipo" value="informacoes" autocomplete="off"><img src="icons/info.png" height="48" width="48">
                        Informações
                    </label>
                    <label class="btn btn-primary ">
                        <input type="radio" name="tipo" value="tempos" autocomplete="off"><img src="icons/time.png" height="48" width="48">
                        Tempos
                    </label>
                    <label class="btn btn-primary ">
                        <input type="radio" name="tipo" value="acidentes" autocomplete="off"><img src="icons/crash.png" height="48" width="48">
                        Acidentes
                    </label>
                </div>

                {{--<label class="btn btn-secondary active">--}}
                {{--<input type="radio" name="tipo" value="noticias" autocomplete="off"> Noticias--}}
                {{--</label>--}}
                {{--<label class="btn btn-secondary">--}}
                    {{--<input type="radio" name="tipo" value="informacoes" autocomplete="off"> Informações--}}
                {{--</label>--}}
                {{--<label class="btn btn-secondary">--}}
                    {{--<input type="radio" name="tipo" value="tempos" autocomplete="off"> Tempos--}}
                {{--</label>--}}
                {{--<label class="btn btn-secondary">--}}
                    {{--<input type="radio" name="tipo" value="acidentes" autocomplete="off"> Acidentes--}}
                {{--</label>--}}
                {{--<label class="radio-inline"><input type="radio" name="tipo" value="noticias">Noticias</label>--}}
                {{--<label class="radio-inline"><input type="radio" name="tipo" value="informacoes">Informações</label>--}}
                {{--<label class="radio-inline"><input type="radio" name="tipo" value="tempos">Tempos</label>--}}
                {{--<label class="radio-inline"><input type="radio" name="tipo" value="acidentes">Acidentes</label>--}}
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
            <input required type="text" class="form-control" name="titulo" placeholder="Titulo">
        </div>
        <div class="form-group">
            <label for=""><strong>Mensagem</strong></label>
            <textarea required type="text" name="corpo" class="form-control" placeholder="Mensagem"></textarea>
        </div>
        {{ csrf_field() }}

        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
</div>

<br>
<hr class="style-two">

<div class="container col-lg-6">
    <div style="margin-top: 1%">
        <table class="table table-striped table-bordered" id="datatable" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Visivel</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tfoot>
            @foreach ($mensagens as $mensagem)
            <tr>
                <th>{{$mensagem->titulo}}</th>
                <th>{{$mensagem->tipo_noticia}}</th>
                <th>{{$mensagem->created_at}}</th>
                <th>
                    @if($mensagem->visivel == true)
                        Sim
                    @endif
                    @if($mensagem->visivel == false)
                        Nao
                    @endif
                </th>
                <th><button data-toggle="modal" data-target="#mensagem" class="btn btn-info" onclick="updateModalInfo('{{$mensagem->informacao}}'); updateModalHeader('{{$mensagem->titulo}}')">Detalhes</button></th>
                <th><a class="btn btn-danger" href="{{route('eliminarMensagem', ['id' => $mensagem->id])}}">Eliminar</a></th>
                @if($mensagem->visivel == true)
                    <th><a class="btn btn-primary" href="{{route('alterarEstadoMensagem', ['id' => $mensagem->id])}}">Esconder</a></th>
                    @endif
                @if($mensagem->visivel == false)
                    <th><a class="btn btn-primary" href="{{route('alterarEstadoMensagem', ['id' => $mensagem->id])}}">Mostrar</a></th>
                @endif
            </tr>
                @endforeach
            </tfoot>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

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

<script>
    function alterarEstadoMensagem(estadoMensagem) {
        if(estadoMensagem==true){
            estadoMensagem = false;
        }else{
            estadoMensagem = true;
        }
    }
</script>


<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/mensagens.js"></script>

</body>