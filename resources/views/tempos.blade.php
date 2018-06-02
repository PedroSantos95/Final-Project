<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <title>Rally Sernancelhe Aguiar da Beira</title>

</head>

<body>
s

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
                    <a class="nav-link active" href="{{route('tempos')}}">Tempos</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('noticias')}}">Noticias</a>
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

            </div>

        </div>


        <div class="col-sm-4 col-sm-offset-4 col-lg-12" style="margin-top: 1%">
            <table class="table table-striped table-bordered" id="datatable" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Carro</th>
                    <th>Tempo Partida</th>
                    <th>T1</th>
                    <th>T2</th>
                    <th>T3</th>
                    <th>T4</th>
                    <th>T5</th>
                    <th>T6</th>
                    <th>T7</th>
                    <th>T8</th>
                    <th>T9</th>
                    <th>T10</th>
                    <th>TT</th>
                </tr>
                </thead>

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


<!-- Bootstrap core JavaScript -->
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/temposintermedios.js"></script>
</body>

</html>
