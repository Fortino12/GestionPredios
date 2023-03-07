@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('wage.create')}}">Jornanda</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Actividad</th>
                    <th>Area</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($wages as $wage)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$wage['actividad_id']}}</td>
                    <td>{{$wage['area_id']}}</td>
                    <td>{{$wage['fecha']}}</td>
                    <td>{{$wage['estatus']}}</td>
                    <td>
                        <a href="{{route('wage.edit',$wage['id'])}}"  class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('wage.destroy',$wage['id'])}}" method="post">
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
        <a href="{{route('wage.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

