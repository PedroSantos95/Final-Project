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

        .custom-datatable {
            table-layout: fixed;
        }

        .custom-datatable td {
            overflow: auto;
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
                    <a class="nav-link" href="{{route('noticias')}}">Noticias</a>

                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('adminBoard')}}">Administrador</a>
                    <span class="sr-only">(current)</span>
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
    <div class="container col-lg-6" style="padding-top: 70px;text-align: center; padding-bottom: 20px;">
        <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Mensagem submetida com sucesso</strong>
        </div>
    </div>
    <div style="text-align: center">
        <h3>Noticias | Admin</h3>
    </div>
    <div class="container col-lg-6">
        <form action="" method="POST">
            <div style="text-align: left;">

                <label style="padding-top: 10px; padding-right: 10px; text-align-all: left "><strong>Tipo de noticia: </strong></label>
                <div class="wrapper text-left">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @for ($i = 0; $i <sizeof($tiposNoticia); $i++)
                            <label class="btn btn-outline-info">
                                <input required type="radio" name="tipo" value="{{$tiposNoticia[$i]->id}}" autocomplete="off">
                                <img src="/icons/{{$tiposNoticia[$i]->path_black}}" height="32" width="32">
                                {{$tiposNoticia[$i]->nome}}
                            </label>
                        @endfor
                    </div>
                </div>


            </div>
            <br>
            <div class="form-group" style="text-align: left;">
                <label for="" style="padding-right: 20px;"><strong>Titulo da Mensagem:</strong></label>
                <input required type="text" class="form-control" name="titulo" placeholder="Titulo" maxlength="30">
            </div>
            <div class="form-group" style="text-align: left;">
                <label for=""><strong>Mensagem:</strong></label>
                <textarea required type="text" name="corpo" class="form-control" placeholder="Mensagem"
                          maxlength="255"></textarea>
            </div>
            {{ csrf_field() }}

            <input type="submit" class="btn btn-outline-info" onclick="functionAlert()" value="Submeter">
        </form>
    </div>
    <br>


    <hr class="style-two">

    <div class="container col-lg-10">
        <div style="margin-top: 1%">
            <table class="table table-striped table-bordered custom-datatable display responsive nowrap" id="datatable"
                   cellspacing="0" style="width: 100%; text-align: center">
                <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Titulo</th>
                    <th class="one">Mensagem</th>
                    <th class="one">Data</th>
                    <th class="one" width="10%">Visivel</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Tipo</th>
                    <th>Titulo</th>
                    <th class="one">Mensagem</th>
                    <th class="one">Data</th>
                    <th class="one">Visivel</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($mensagens as $mensagem)
                    <tr>

                        <td class="block">{{$mensagem->tipoNoticia->nome}}</td>
                        <td style="overflow: auto">{{$mensagem->titulo}}</td>
                        {{--<th>{{$mensagem->tipo_noticia}}</th>--}}
                        {{--<th><img src="icons/{{$mensagem->tipoNoticia->path_black}}" height="48" width="48"></th>--}}
                        <td style="overflow: auto" class="one">{{$mensagem->informacao}}</td>
                        <td style="overflow: hidden" class="one">{{$mensagem->created_at}}</td>
                        <td style="overflow: hidden" class="one">
                            @if($mensagem->visivel == true)
                                Sim
                            @endif
                            @if($mensagem->visivel == false)
                                Nao
                            @endif
                        </td>
                        <td style="overflow: hidden">
                            <a data-toggle="modal" data-target="#mensagem" style="padding-right: 10px"

                                    onclick="updateModalInfo('{{$mensagem->informacao}}'); updateModalHeader('{{$mensagem->titulo}}'); updateModalTipoNoticia('{{$mensagem->tipo_noticia_id}}');
                                            updateModalCreatedAt('{{$mensagem->created_at}}'); updateModalVisivel('{{$mensagem->visivel}}')">
                                <img height="32" width="32"src="icons/loupe.png">
                            </a>
                            <a style="padding-right: 10px"
                               href="{{route('editarMensagem', ['id' => $mensagem->id])}}"><img height="32" width="32"src="icons/edit.png"></a>
                            @if($mensagem->visivel == true)
                                <a style="padding-right: 10px"
                                   href="{{route('alterarEstadoMensagem', ['id' => $mensagem->id])}}"><img height="32" width="32"src="icons/hide.png"></a>
                            @endif
                            @if($mensagem->visivel == false)
                                <a style="padding-right: 10px"
                                   href="{{route('alterarEstadoMensagem', ['id' => $mensagem->id])}}"><img height="32" width="32"src="icons/view.png"></a>
                            @endif
                            <a style="padding-right: 10px"
                               href="{{route('eliminarMensagem', ['id' => $mensagem->id])}}"><img height="32" width="32"src="icons/cancel.png"></a>
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
                <p>
                    <strong><span style="word-wrap: break-word;">Tipo Noticia: </span></strong>
                    <span class="modal-tipo" style="word-wrap: break-word"></span>
                </p>
                <p>
                    <strong><span style="word-wrap: break-word;">Texto da Noticia: </span></strong>
                    <span class="informacao_modal" style="word-wrap: break-word"></span>
                </p>
                <p>
                    <strong><span style="word-wrap: break-word;"></span></strong>
                    <span class="modal-visivel" style="word-wrap: break-word"></span>
                </p>
                <p>
                    <strong><span style="word-wrap: break-word;">Created_at: </span></strong>
                    <span class="modal-created_at" style="word-wrap: break-word"></span>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
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
        $('.modal-title').html( titulo);
    }
</script>

<script>
    function updateModalTipoNoticia(tipo) {
        if (tipo == 1) {
            $('.modal-tipo').html("Informações");
        }
        if (tipo == 2) {
            $('.modal-tipo').html("Noticias");
        }
        if (tipo == 3) {
            $('.modal-tipo').html("Acidentes");
        }
        if (tipo == 4) {
            $('.modal-tipo').html("Tempos");
        }
    }
</script>

<script>
    let saved = 0;
    saved = {{$saved}};
    let alert = document.getElementById("alert");
    if(saved === 1){
        alert.style.display='';
    }
</script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
</script>

<script>
    function updateModalCreatedAt(created_at) {
        $('.modal-created_at').html(created_at);
    }
</script>

<script>
    function updateModalVisivel(visivel) {
        visibility = visivel == 1 ? 'encontra-se' : 'não se encontra';
        $('.modal-visivel').html("A noticia " + visibility + " visivel para os utilizadores!");
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
{{--<script type="text/javascript" charset="utf8"--}}
{{--src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js"></script>
<script src="/js/mensagens.js"></script>

</body>