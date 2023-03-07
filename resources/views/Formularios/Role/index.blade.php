@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('rol.create')}}">Roles</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nombre del Rol</th>
                    <th>Slug</th>
                    <th>Descripción</th>
                    <th>Full-Access</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $rol)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$rol['nombreRol']}}</td>
                    <td>{{$rol['slug']}}</td>
                    <td>{{$rol['descripcion']}}</td>
                    <td>{{$rol['full_access']}}</td>
                    <td>
                        <a href="{{route('rol.edit',$rol['id'])}}"  class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('rol.destroy',$rol['id'])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="ejemplo">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="btn_container">
        <a href="{{route('rol.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

