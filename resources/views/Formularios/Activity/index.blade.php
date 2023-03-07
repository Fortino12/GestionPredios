@extends('layouts.admin')

@section('contenido')


    @include('custom.message')

    <div class="title1">
        <h2><a href="{{route('activity.create')}}">ACTIVIDADES</h2></a>
    </div>

<div style="overflow-x:auto;">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Codigo</th>
                <th>Descripción</th>
                <th colspan="2" class="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$activity['codigo']}}</td>
                    <td>{{$activity['descripcion']}}</td>
                    <td>
                        <a href="{{route('activity.edit',$activity['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('activity.destroy',$activity['id'])}}" method="post">
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
    <a href="{{route('activity.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
</div>                     

@endsection