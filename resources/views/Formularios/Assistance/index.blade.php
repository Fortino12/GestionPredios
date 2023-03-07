@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('area.create')}}">Asistencias</h2></a>
    </div>
    @include('custom.message')
<div style="overflow-x:auto;">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Trabajador</th>
                <th>Área</th>
                <th>Estatus</th>
                <th>Fecha</th>
                <th colspan="2" class="text-center">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assistances as $assistance)
            <tr>
                <td scope="row">{{$loop->index+1}}</td>
                <td>{{$assistance->employees->nombreTrabajador}}</td>
                <td>{{$assistance->areas->descripcion}}</td>
                <td>{{$assistance['estatus']}}</td>
                <td>{{$assistance['fecha']}}</td>
                <td>
                    <a href="{{route('assistance.edit',$assistance['id'])}}" class="banner-btn">Editar</a>
                </td>
                <td>
                    <form action="{{route('assistance.destroy',$assistance['id'])}}" method="post">
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
    <a href="{{route('assistance.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
</div>  

@endsection

