<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>@yield("title")</title>
</head>
<body>
    <nav class="navbar navbar-light nav-admin bg-primary sticky-top mb-5">
        <div class="container-fluid p-2">
            <div class="row w-100">
                <div class="col d-flex justify-content-center align-items-center">
                    <a href="{{ route('main') }}">
                        <h4 class="text-white d-flex justify-content-center m-0" style="letter-spacing: 3px;">TourAlmería</h4>
                    </a>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <a class="nav-link text-white text-center" href="{{ route('user.index') }}">Listado Usuarios</a>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <a class="nav-link text-white text-center" href="{{ route('category.index') }}">Listado Categorias</a>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <a class="nav-link text-white text-center" href="{{ route('establishment.index') }}">Listado Establecimientos</a>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <a class="nav-link text-white text-center" href="{{ route('review.index') }}">Listado Reseñas</a>
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    <a class="nav-link text-white text-center" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div>@yield("content")</div>
    
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>