@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('user.create')}}">Usuarios</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Nombre del Usuario</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Matenro</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Telefono</th>
                    <th >Email</th>
                    <th >Rol</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$user->nombre}}</td>
                    <td>{{$user->paterno}}</td>
                    <td>{{$user->materno}}</td>
                    <td>{{$user->fechaNacimiento}}</td>
                    <td>{{$user->sexo}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles->nombreRol}}</td>
                    <td>
                        <a href="{{route('user.edit',$user['id'])}}"  class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('user.destroy',$user['id'])}}" method="post">
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
        <a href="{{route('user.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

