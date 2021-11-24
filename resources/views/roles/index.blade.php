@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Lista de Roles</h2></div>

                <div class="card-body">

                    <a class="btn btn-primary float-right" href="{{route('roles.create')}}">Crear</a>
                    

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Slu</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Acceso-Ilimitado</th>
                            <th colspan="3"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            @foreach ($roles as $role)
                              <th scope="row">{{$role->id}}</th>
                              <td>{{$role->nombre}}</td>
                              <td>{{$role->slug}}</td>
                              <td>{{$role->descripcion}}</td>
                              <td>{{$role['acceso-ilimitado']}}</td>
                              <td><a class="btn btn-info" href="{{route('roles.show',$role->id)}}">Ver</a></td>
                              <td><a class="btn btn-success" href="{{route('roles.edit',$role->id)}}">Editar</a></td>
                              <td><a class="btn btn-danger" href="{{route('roles.edit',$role->id)}}">Eliminar</a></td>
                            @endforeach
                          </tr>
                         
                        </tbody>
                      </table>
                      {{$roles->links()}}



                </div>
            </div>
        </div>
    </div>
</div>
@endsection