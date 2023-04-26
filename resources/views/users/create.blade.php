
@extends('layout/template')

@section('title', 'Registrar Usuarios')

@section('contenido')

<main>
    <div class="container py-4 mt-3">
        <div class="card col-6 m-auto">
            <div class="card-body">
                <h5>REGISTRAR USUARIOS</h3>
                    <form action="{{ url('resource-users') }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="mb-3">
                                <label class="form-label">Nombre completo:</label>
                                <input type="text" class="form-control" id="name_lastname" name="name_lastname" placeholder="Julia Lopez" value="{{ old('name_lastname') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Correo electrónico:</label>
                                <input type="email" class="form-control" id="email" name="email"placeholder="prueba@example.com" value="{{ old('email')}}"  required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="***" value="{{ old('password')}}"  required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            &nbsp;
                            &nbsp;
                            <a href="{{ url('resource-users')}}" class="btn btn-secondary"> Regresar</a>
                        </div>
              
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <strong>{{ $error }}</strong><br>
                                @endforeach
                            </ul>
                        
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</main>
@endsection