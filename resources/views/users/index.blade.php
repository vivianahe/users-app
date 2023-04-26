@extends('layout/template')

@section('title', 'Listado Usuarios')

@section('contenido')
<main >


    <div class="container py-4 mt-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p style="font-size: 18px" class="text-center"><strong>LISTADO USUARIOS</strong> </p>
                    </div>
                   
            
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                        <strong>    {{ session('success') }}</strong><br>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </div>
                <div class="col-2">
                    <a href="{{ url('resource-users/create') }}" class="btn btn-primary">Agregar <i class="fas fa-plus"></i></a>
                </div>
                <div class="table-responsive">
                    <table  class="table  table-striped mt-4 text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre completo</th>
                                <th>Correo electrónico</th>
                                <th>Estado</th>
                                <th>Fecha creación</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users)
                            @foreach($users as $user)
                            <tr class="text-center">
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email}}</td>
                                @if ($user->deleted_at == null)
                                    <td>Activo</td>
                                @else
                                    <td>Inactivo</td>
                                @endif
                                <td>{{ $user->created_at}}</td>
                                <td><a href="{{ url('resource-users/'.$user->id.'/edit')}}" class="btn btn-secondary">Editar  <i class="fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ url('resource-users/'.$user->id)}}" method="POST">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tfoot>
                    </table>
                </div>
          
            </div>
        </div>
        
        
    </div>
</main>
@endsection
@section('js')
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection