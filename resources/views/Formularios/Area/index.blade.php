@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('area.create')}}">Áreas</h2></a>
    </div>
    @include('custom.message')
<div style="overflow-x:auto;">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Cota</th>
                <th>Descripción</th>
                <th>Predio</th>
                <th colspan="2" class="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $area)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td>{{$area->cota}}</td>
                <td>{{$area->descripcion}}</td>
                <td>{{$area->properties->nombrePredio}}</td>
                    <td>
                        <a href="{{route('area.edit',$area->id)}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('area.destroy',$area->id)}}" method="post">
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
    <a href="{{route('area.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
</div>  

@endsection