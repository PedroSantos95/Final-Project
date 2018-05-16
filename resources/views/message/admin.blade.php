<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" content="no-cache">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <title>Pagina Administrador Gestão Mensagens</title>
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

        @media only screen and (max-width: 1200px) {
            .one {
                display: none;
            }
        }
    </style>
    <style type="text/css">
        a:hover {
            cursor:pointer;
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
@if(!Auth::check())

<div style="margin-top: 80px">
	erro
</div>

@endif
@if(Auth::check())
    <div class="container col-lg-6" style="padding-top: 65px;text-align: center; padding-bottom: 20px;">
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
                    <div  class="btn-group btn-group-toggle" data-toggle="buttons">
                        @for ($i = 0; $i <sizeof($tiposNoticia); $i++)
                            <label class="btn btn-outline-info">
                                <div style="width: 120px">
                                    <input required type="radio" name="tipo" value="{{$tiposNoticia[$i]->id}}" autocomplete="off">
                                    <img src="/icons/{{$tiposNoticia[$i]->path_black}}" height="32" width="32">
                                    {{$tiposNoticia[$i]->nome}}
                                </div>
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
            <table class="table table-striped table-bordered custom-datatable display nowrap" id="datatable"
                   cellspacing="0" style="width: 100%">
                <thead>
                <tr>
                    <th style="text-align: center">Tipo</th>
                    <th style="text-align: center">Titulo</th>
                    <th style="text-align: center">Mensagem</th>
                    <th style="text-align: center">Data</th>
                    <th style="text-align: center" width="10%">Estado</th>
                    <th style="text-align: center" >Opções</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
            <div class="modal-body" style="margin-bottom: -20px">
                <p>
                    <strong><span style="word-wrap: break-word;">Corpo da noticia</span></strong>
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


<script>
    function updateModalInfo(informacao) {
        $('.informacao_modal').text(informacao);
    }
</script>

<script>
    function updateModalHeader(titulo, tipo) {
        if(tipo==1){
            $('.modal-title').html( titulo + '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/news_black.png" height="32" width="32">');
        }
        if(tipo==4){
            $('.modal-title').html( titulo + '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/info_black.png" height="32" width="32">');
        }
        if(tipo==2){
            $('.modal-title').html( titulo + '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/crash_black.png" height="32" width="32">');
        }
        if(tipo==3){
            $('.modal-title').html( titulo + '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/time_black.png" height="32" width="32">');
        }
    }
</script>

<script>
    function updateModalCreatedAt(created_at) {
        $('.modal-created_at').html(created_at);
    }
</script>

<script>
    function updateModalVisivel(visivel) {
        visibility = visivel == 1 ?
            '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/view.png" height="32" width="32">' :
            '<img style="margin-top:5px; margin-left:5px" align="left" hspace="20" src="/icons/hide.png" height="32" width="32">';
        $('.modal-visivel').html(visibility);
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
<script src="/js/admin.js"></script>

</body>