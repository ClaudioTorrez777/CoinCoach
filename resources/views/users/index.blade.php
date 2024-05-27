@extends("layouts.app")
@section("content")
    <div class="row justify-content-center">
        <div class="col-8 bg-white pt-3 table-responsive">

            <a href="" class="btn btn-success text-white mb-3">Agregar usuario</a>

            <table class="table">
                <thead>
                <tr>
                    <td>Indice</td>
                    <td>Nombre</td>
                    <td>Apellido Paterno</td>
                    <td>Apellido Materno</td>
                    <td>No. de identificación</td>
                    <td>Capital</td>
                    <td>Rendimiento</td>
                    <td>Correo electrónico</td>
                    <td>Eliminar</td>
                    <td>Editar</td>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->ap}}</td>
                        <td>{{$usuario->am}}</td>       
                        <td>{{$usuario->no_identificacion}}</td>
                        <td>{{$usuario->capital}}</td>
                        <td>{{$usuario->rendimiento}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>
                            <form action="" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">x</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary text-white" href="">Editar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
