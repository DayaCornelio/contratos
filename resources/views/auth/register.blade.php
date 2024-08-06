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

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-5 mt-md-4 pb-5">
  
                <h2 class="fw-bold mb-2 text-uppercase">Administración Portuaria Integral de Campeche</h2>

                <p class="text-white-50 mb-5">Registrarse</p>

                <form action="{{route('register')}}" method="POST">
                @csrf
            
                <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Nombre"/>
                    <label class="form-label">nombre</label>
                  </div>
  
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Correo"/>
                  <label class="form-label">Correo</label>
                </div>
  
                <div data-mdb-input-init class="form-outline form-white mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Contraseña"/>
                  <label class="form-label">Contraseña</label>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password"
                        placeholder="Confirmar contraseña" name="password_confirmation">
                        <label class="form-label">Confirmar contraseña</label>
                </div>
  
                <button  type="submit" class="btn btn-outline-light btn-lg px-5">Crear cuenta</button>
            </form>
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="https://www.facebook.com/APICampechePuertos" class="text-white"><i class="fab fa-facebook-f fa-lg mx-4 px-2"></i></a>
                  <a href="https://apicampeche.com.mx/" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>
              </div>
              <div>
                <p class="mb-0">Ya tienes una cuenta? <a href="{{route('login')}}" class="text-white-50 fw-bold">Ingresar</a>
                </p>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>