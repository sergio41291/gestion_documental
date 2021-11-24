@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Rol</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('roles.store')}}" method="POST">
                        @csrf
                        <div class="container">
                            <h3>Ingresar Datos</h3>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="name">
                            </div >
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" placeholder="Slu" name="slug">
                            </div >
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Descripcion" name="descripcion"  id="descripcion" rows="3"></textarea>
                            </div>

                            <hr>

                            <h3>Acceso Ilimitado</h3>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="acceso-ilimitado" id="accesoilimitadosi" value="yes">
                                <label class="custom-control-label" for="accesoilimitadosi">SI</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="acceso-ilimitado" id="accesoilimitadono" value="no" checked>
                                <label class="custom-control-label" for="accesoilimitadono">NO</label>
                            </div>

                            <hr>

                            <h3>Lista de Permisos</h3>
                            @foreach($permisos as $permiso)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="permiso_{{$permiso->id}}" value="{{$permiso->id}}" name="permiso[]">
                                <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                                    {{$permiso->id}}
                                    -
                                    {{$permiso->nombre}}
                                    <en>({{$permiso->descripcion}})</en>
                                </label>
                            </div>
                            @endforeach
                            <hr>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection