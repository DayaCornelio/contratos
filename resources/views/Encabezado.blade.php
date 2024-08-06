<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/style.css')}}">

    <title>@yield('name')</title>
</head>
<body>

  @yield('nav')
    <div class="container-fluid py-1">
        <nav class="navbar navbar-green navbar-expand-lg navbar-light bg-body-tertiary">
            <div class="container-fluid">
                <div class="img2">
                    <img src="{{ asset('assets/img/Api_Campeche.jpg') }}" class="img-fluid" alt="API">
                </div>
                <a class="navbar-brand" style="font-family: 'Georgia', serif; font-style: italic; color: white;">API CAMPECHE</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                    <a class="nav-link active" aria-current="page" href="{{ route('Inicio') }}" style="color: white;">Inicio</a>
                </li>                
                  <li class="nav-item" style="font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                    <a class="nav-link active" aria-current="page" href="{{ route('Formulario') }}" style="color: white;">Formulario</a>
                  </li>
                </ul>
              </div>

                <form action="{{url('Inicio')}}" method="POST">
                  @csrf
                  <a class="btn btn-sm btn-danger" data-bs-toggle="button" href="#" onclick="this.closest('form').submit()">Cerrar Sesión</i></a>
                </form>

            </div>
          </nav>     
        </form>  
    </div>

    @yield('contenido')


  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(128, 32, 32, 0.986);">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap-fill" viewBox="0 0 16 16" style="background-color: rgb(255, 255, 255);">
            <path d="M1 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zM1 12a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm5 0a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1z"/>
          </svg> 2024:
      <a class="text-reset fw-bold" href="https://apicampeche.com.mx/">API</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
