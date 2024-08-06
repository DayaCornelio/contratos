@extends('Encabezado')

@section('title', 'Inicio')

@section('nav')
@endsection

@section('contenido')

<section class="Fondo">
    <div id="carouselExampleCaptions" class="carousel slide mb-5"  data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/Lerma_API.jpg') }}" alt="Lerma API" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Puerto de lerma</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/Carmen_API.jpg') }}" alt="Carmen API" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Puerto de carmen</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/Seybaplaya_API.jpg') }}" alt="Seybaplaya API" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Puerto de seybaplaya</h5>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="about-section shadow-lg p-3 mb-5 bg-body rounded">
        <h3 class="fw-bold mb-3">¿Quiénes somos?</h3>
        <h5>
            <p>
                Se han creado líneas de acción como el Programa Visita tu Puerto, que busca la socialización de la experiencia de estudiantes de nivel Básico, Media y Superior a conocer presencialmente los puertos de Altura y Cabotaje de Carmen, Seybaplaya y Lerma, así como los muelles pesqueros, su operación y seguridad, así como su historia.
            </p>
            <p>
                Asimismo, la operación de los Complejos Turísticos de Isla Aguada, Carmen e Isla Arena, Calkiní que enmarcan los Faros de señalización marítima, recrean a las comunidades portuarias y del sector pesquero, con servicios turísticos, talleres comunitarios y de apoyo social.
            </p>
            <p>
                El Balneario de Playa Bonita ubicado en la Comunidad de Lerma, busca en su operación ofrecer los mejores servicios de turismo de playa, con fácil acceso, promoción de transporte desde el centro histórico de la ciudad, infraestructura adecuada, cuotas accesibles, accesibilidad para personas con discapacidad y servicios satisfactorios (restaurantes, palapas, baños, áreas deportivas, estacionamiento y oficinas administrativas) al turismo local, nacional e internacional.
            </p>
            <p>
                La asistencia social desde el Centro de Desarrollo Comunitario de San Francisco Kobén es parte de la contribución de responsabilidad social de la APICAM que colabora con el Sistema DIF Estatal.
            </p>
        </h5>
    </div>



    <div class="row row-cols-1 row-cols-md-3 g-4 img3 ">
        <div class="col">
          <div class="card border-danger h-100 p-2 shadow-lg p-3 mb-5 bg-body rounded">
            <img src="{{ asset('assets/img/Objetivo.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Objetivo</h5>
              <p class="card-text">
                La vinculación de las comunidades portuarias con las actividades que se realizan en los Puertos es una de las acciones  prioritarias de la Administración Portuaria Integral (API) del Estado de Campeche.
              </p>
            </div>
            <div class="card-footer border-danger">
              <small class="text-muted">APICAM</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card border-danger h-100 p-2 shadow-lg p-3 mb-5 bg-body rounded">
            <img src="{{ asset('assets/img/Horario.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Nuestros horarios de oficina:</h5>
              <p class="card-text">De 8:00 a 16:00 horas.</p>
            </div>
            <div class="card-footer border-danger">
              <small class="text-muted">APICAM</small>
            </div>
          </div>
        </div>
      </div>
</section>

@endsection
