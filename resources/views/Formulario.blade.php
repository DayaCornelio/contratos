@extends('Encabezado')

@section('title', 'Formulario')

@section('nav')
@endsection

@section('contenido')
<main>
    <div class="container">
        <div class="card shadow-sm mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    Formulario API
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ol" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5"/>
                        <path d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635z"/>
                    </svg>
                </h2>

                <form id="fileForm" action="{{ url('Formulario') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-xl-12">
                        <div class="table-responsive">
                            <div class="mb-5 row">
                                <label for="n_contrato" class="col-sm-3 col-form-label">No. contrato</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="n_contrato" id="n_contrato" value="{{ old('n_contrato') }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="descripcion_contrato" class="col-sm-3 col-form-label">Descripcion del contrato</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="descripcion_contrato" id="descripcion_contrato" value="{{ old('descripcion_contrato') }}" required>
                                </div>
                            </div>
        
                            <div class="mb-3 row">
                                <label for="archivo" class="col-sm-3 col-form-label">Selecciona tus archivos</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" name="archivo[]" id="archivo" multiple required accept=".pdf,.xlsx,.docx,.png,.jpg,.jpeg">
                                    <div id="fileError" class="text-danger mt-2"></div>
                                </div>
                            </div>
        
                            <div class="mb-3 row">
                                <div class="col-sm-12 text-end">
                                    <button type="submit" class="btn btn-success">Subir</button>
                                </div>
                            </div>
                        </form>
                        <!-- Fin formulario -->
                        </div>
                    </div>
                    <!-- Tabla de progreso -->
                    <div class="progress mt-3">
                        <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%; height: 30px; background-color: #4caf50; text-align: center; line-height: 30px; color: white;">0%</div>
                    </div>
            </div>
        </div>

        <!-- Inicia -->
        <div class="mt-5 col-xl-12">
            <h3 class="text-center mb-4">Registro de los formularios</h3>
            
            <!-- Search Form -->
            <form action="{{ url('Formulario') }}" method="GET">
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por No. contrato o Descripcion" value="{{ request('search') }}">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>

            <!-- Inicia tabla de registro -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-default">
                        <tr>
                            <th scope="col">No. contrato</th>
                            <th scope="col">Descripcion del contrato</th>
                            <th scope="col">Archivos</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formularios as $formulario)
                        <tr>
                            <td>{{ $formulario->n_contrato }}</td>
                            <td>{{ $formulario->descripcion_contrato }}</td>
                            <td>
                                @foreach($formulario->archivos as $archivo)
                                @php
                                    $ext = pathinfo($archivo->archivo, PATHINFO_EXTENSION);
                                    $icon = '';
                                    switch($ext) {
                                        case 'pdf':
                                            $icon = 'fa-file-pdf text-danger';
                                            break;
                                        case 'xlsx':
                                            $icon = 'fa-file-excel text-success';
                                            break;
                                        case 'docx':
                                            $icon = 'fa-file-word text-primary';
                                            break;
                                        case 'png':
                                        case 'jpg':
                                        case 'jpeg':
                                            $icon = 'fa-file-image text-warning';
                                            break;
                                        default:
                                            $icon = 'fa-file text-secondary';
                                    }
                                @endphp
                                <a href="{{ asset('storage/' . $archivo->archivo) }}" target="_blank">
                                    {{ $archivo->nombre_original }} <i class="fas {{ $icon }}"></i>
                                </a><br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('Formulario/'.$formulario->id.'/Edit' ) }}" class="btn btn-success btn-sm">Editar</a>
                                <form action="{{ url('Formulario/'.$formulario->id) }}" method="post" class="d-inline">
                                    @method("DELETE")
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este formulario?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Fin tabla de registro -->
    </div>
</main>

<script>
    // Validación para los tipos de archivos 
    document.getElementById('archivo').addEventListener('change', function () {
        const fileInput = this;
        const allowedExtensions = ['pdf', 'xlsx', 'docx', 'png', 'jpg', 'jpeg'];
        const files = fileInput.files;
        const errorDiv = document.getElementById('fileError');
        errorDiv.innerHTML = '';

        for (let i = 0; i < files.length; i++) {
            const fileExtension = files[i].name.split('.').pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                errorDiv.innerHTML = 'Solo se permiten archivos de tipo PDF, XLSX, DOCX, PNG, JPG, JPEG.';
                fileInput.value = ''; 
                return;
            }
        }
    });

    // Validación para campos con dos o más puntos
    document.getElementById('fileForm').addEventListener('submit', function(e) {
        const fields = ['n_contrato', 'descripcion_contrato'];
        let valid = true;

        fields.forEach(field => {
            const value = document.getElementById(field).value;
            if ((value.match(/\./g) || []).length >= 2) {
                document.getElementById(field).classList.add('is-invalid');
                valid = false;
            } else {
                document.getElementById(field).classList.remove('is-invalid');
            }
        });

        if (!valid) {
            e.preventDefault();
            alert('Los campos no deben contener dos o más puntos.');
            return false;
        }

        // Barra de progreso
        var form = document.getElementById('fileForm');
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();

        xhr.open('POST', form.action, true);
        xhr.upload.onprogress = function (e) {
            if (e.lengthComputable) {
                var percentComplete = (e.loaded / e.total) * 100;
                document.getElementById('progress-bar').style.width = percentComplete + '%';
                document.getElementById('progress-bar').textContent = Math.round(percentComplete) + '%';
            }
        };

        xhr.onload = function () {
            if (xhr.status === 200) {
                alert('Formulario enviado correctamente');
                document.getElementById('fileForm').reset();
                document.getElementById('progress-bar').style.width = '0%';
                document.getElementById('progress-bar').textContent = '0%';
            } else {
                alert('Hubo un error al enviar el formulario');
            }
        };

        xhr.send(formData);
    });
</script>
@endsection
