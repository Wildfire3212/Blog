<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}} - {{config('app.main')}}</title>
    
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="body__welcome">
   <header>
      <nav id="mainNav" class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top">
        <div class="container container-fluid">
            <a class="navbar-brand" href="{{route('main')}}">WildTech</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    
                    @guest
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link active py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('login')}}">Iniciar sesión</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link active py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('register')}}">Regístrate</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active  mx-0 mx-lg-1 px-0 px-lg-3 rounded js-scroll-trigger" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="mx-0 mx-lg-1"><a class="dropdown-item py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('show.edit', Auth::user()->id)}}">Ver perfil</a></li>
                            @if(Auth::user()->admin)
                            <li class="mx-0 mx-lg-1"><a class="dropdown-item py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('AdminArticulos.index')}}">Administrador</a></li>
                            @endif
                            <li class="mx-0 mx-lg-1">
                                <a class="dropdown-item py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                                <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
<main>
    <div id="contenedor-perfil" class="d-flex">
        <section class="page-section" id="avatar-nombre">
             <div id="perfil" class="masthead bg-secondary text-white text-center">
                <div class="container d-flex align-items-center flex-column justify-content-center">
                   
                    <!-- Masthead Heading-->
                    <h1 class="masthead-heading">{{$user->name}}</h1><br><br><br>
                </div>
            </div>
        </section>
    <!-- Acerca de mí Section-->
    <section class="page-section bg-tercero text-white w-100">
     <div class="container">
         <!-- Acerca Section Heading-->
         <h2 class="page-section-heading text-center text-uppercase text-white">Acerca de mí</h2>
         <!-- Icon Divider-->
         <div class="divider-custom divider-light">
             <div class="divider-custom-line"></div>
             <div class="divider-custom-icon"><i class="fas fa-user-edit"></i></div>
             <div class="divider-custom-line"></div>
         </div>
         <!-- Acerca de mí Section Content-->
         <div class="row">
             <div class="d-flex justify-content-center w-100">
              <p class="lead text-center">{{$user->description}}</p>
          </div>
      </div>
  </div>
</section>
</div>
</main>
<footer class="footer text-center">
      <div class="container">
        <div class="row">
          <!-- Footer Location-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"></h4>
            <p class="lead mb-0"><br /></p>
          </div>
          <!-- Footer Social Icons-->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <br><br><br>
            <h2 class="text-uppercase mb-4 mb-0">Síguenos en nuestras redes</h2>
            <br><br>
            <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-fw fa-facebook-f"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href="/"><i class="fab fa-fw fa-instagram"></i></a>
            <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-fw fa-twitter"></i></a>
          </div>
        </div>
      </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>