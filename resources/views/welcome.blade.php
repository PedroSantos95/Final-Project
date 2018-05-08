<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rally Sernancelhe Aguiar da Beira</title>

    <!-- Bootstrap core CSS -->
    {{--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}

    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
                    <a class="nav-link active" href="{{route('tempos')}}">Tempos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('noticias')}}">Noticias</a>
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

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-sm-4 col-sm-offset-4 col-lg-12">
            <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin-top: 8%;">
                <button class="btn btn-secondary" disabled>
                    <a> PECS: </a>
                </button>
                <label class="btn btn-secondary active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> 1
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option2" autocomplete="off"> 2
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option3" autocomplete="off"> 3
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option4" autocomplete="off"> 4
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option5" autocomplete="off"> 5
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option6" autocomplete="off"> 6
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option7" autocomplete="off"> 7
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option8" autocomplete="off"> 8
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option9" autocomplete="off"> 9
                </label>
                <label class="btn btn-secondary">
                    <input type="radio" name="options" id="option10" autocomplete="off"> 10
                </label>

            </div>

        </div>



        <!-- /.col-lg-3 -->
        <div class="col-lg-12">

            <div class="alert alert-success alert-dismissible" style="margin-top: 2%">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Indicates a successful or positive action.
            </div>


        </div>
        <div class="col-sm-4 col-sm-offset-4 col-lg-12" style="margin-top: 1%">
            <table class="table table-striped table-bordered" id="datatable" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Posicao</th>
                    <th>Piloto</th>
                    <th>Navegador</th>
                    <th>Viatura</th>
                    <th>Partida</th>
                    <th>1</th>
                    <th>2</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Posicao</th>
                    <th>Piloto</th>
                    <th>Navegador</th>
                    <th>Viatura</th>
                    <th>Partida</th>
                    <th>1</th>
                    <th>2</th>
                    <th>Total</th>
                </tr>
                </tfoot>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div>
    </div>

</div>

</div>

<!-- Modal -->


<!-- /.container -->

<!-- Footer -->
<footer class="py-6 bg-dark">

</footer>

<!-- Bootstrap core JavaScript -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/temposintermedios.js"></script>
</body>

</html>
