@extends('Encabezado')

@section('title', 'Editar')

@section('nav')
@endsection

@section('contenido')
<main>
    <div class="container">
        <div class="card shadow-sm mt-5">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    Editar Formulario
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-list-ol" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                        <path
                            d="M1.713 11.865v-.474H2c.217 0 .363-.137.363-.317 0-.185-.158-.31-.361-.31-.223 0-.367.152-.373.31h-.59c.016-.467.373-.787.986-.787.588-.002.954.291.957.703a.595.595 0 0 1-.492.594v.033a.615.615 0 0 1 .569.631c.003.533-.502.8-1.051.8-.656 0-1-.37-1.008-.794h.582c.008.178.186.306.422.309.254 0 .424-.145.422-.35-.002-.195-.155-.348-.414-.348h-.3zm-.004-4.699h-.604v-.035c0-.408.295-.844.958-.844.583 0 .96.326.96.756 0 .389-.257.617-.476.848l-.537.572v.03h1.054V9H1.143v-.395l.957-.99c.138-.142.293-.304.293-.508 0-.18-.147-.32-.342-.32a.33.33 0 0 0-.342.338zM2.564 5h-.635V2.924h-.031l-.598.42v-.567l.629-.443h.635z" />
                    </svg>
                </h2>

                <form action="{{ route('formulario.update', $formulario->id) }}" method="POST"
                    enctype="multipart/form-data" id="miFormulario">
                    @method("PUT")
                    @csrf

                    <div class="mb-3 row">
                        <label for="n_contrato" class="col-sm-3 col-form-label">No. contrato</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="n_contrato" id="n_contrato"
                                value="{{ $formulario->n_contrato }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="descripcion_contrato" class="col-sm-3 col-form-label">Descripción del contrato</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="descripcion_contrato" id="descripcion_contrato"
                                value="{{ $formulario->descripcion_contrato }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Archivos actuales</label>
                        <div class="col-sm-9">
                            @if ($formulario->archivos->isNotEmpty())
                            <ul class="list-group">
                                @foreach ($formulario->archivos as $archivo)
                                <li class="list-group-item">
                                    <a href="{{ asset('storage/'.$archivo->archivo) }}" target="_blank">{{ $archivo->nombre_original }}</a>
                                    <a href="{{ route('archivo.eliminar', $archivo->id) }}"
                                        class="btn btn-sm btn-danger ms-2">Eliminar</a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            <p>No hay archivos adjuntos.</p>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="archivo" class="col-sm-3 col-form-label">Subir archivos</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="archivo[]" id="archivo" multiple>
                            <div id="archivo-label">No se han seleccionado archivos.</div>
                            <div id="fileError" style="color: red;"></div>
                        </div>
                    </div>

                    <div class="mb-5 d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('Formulario') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
                <!-- Fin formulario -->
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('archivo').addEventListener('change', function() {
        var label = document.getElementById('archivo-label');
        var fileInput = this;
        var allowedExtensions = ['pdf', 'xlsx', 'docx', 'png', 'jpg', 'jpeg'];
        var files = fileInput.files;
        var errorDiv = document.getElementById('fileError');
        errorDiv.innerHTML = '';

        if (files.length > 0) {
            var filesList = '<ul>';
            for (var i = 0; i < files.length; i++) {
                var fileExtension = files[i].name.split('.').pop().toLowerCase();
                if (!allowedExtensions.includes(fileExtension)) {
                    errorDiv.innerHTML = 'Solo se permiten archivos de tipo PDF, XLSX, DOCX, PNG, JPG, JPEG.';
                    fileInput.value = ''; 
                    label.textContent = 'No se han seleccionado archivos.';
                    return;
                }
                filesList += '<li>' + files[i].name + '</li>';
            }
            filesList += '</ul>';
            label.innerHTML = 'Archivos seleccionados:' + filesList;
        } else {
            label.textContent = 'No se han seleccionado archivos.';
        }
    });

    document.getElementById('miFormulario').addEventListener('submit', function(event) {
        var fileInput = document.getElementById('archivo');
        var allowedExtensions = ['pdf', 'xlsx', 'docx', 'png', 'jpg', 'jpeg'];
        var files = fileInput.files;
        var errorDiv = document.getElementById('fileError');
        errorDiv.innerHTML = '';

        for (var i = 0; i < files.length; i++) {
            var fileExtension = files[i].name.split('.').pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                errorDiv.innerHTML = 'Solo se permiten archivos de tipo PDF, XLSX, DOCX, PNG, JPG, JPEG.';
                event.preventDefault(); // Evita el envío del formulario
                return;
            }
        }
    });
</script>
@endsection
