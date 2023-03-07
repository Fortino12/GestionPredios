@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('permission.create')}}">Permisos</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nombre del Permiso</th>
                    <th>Slug</th>
                    <th>Descripción</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$permission['nombrePermiso']}}</td>
                    <td>{{$permission['slug']}}</td>
                    <td>{{$permission['descripcion']}}</td>
                    <td>
                        <a href="{{route('permission.edit',$permission['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('permission.destroy',$permission['id'])}}" method="post">
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
        <a href="{{route('permission.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

