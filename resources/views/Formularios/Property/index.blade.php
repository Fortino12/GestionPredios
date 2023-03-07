@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('property.create')}}">Predios</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Estado</th>
                    <th>Municipio</th>
                    <th>Dirección</th>
                    <th>Predio</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$property['estado']}}</td>
                    <td>{{$property['municipio']}}</td>
                    <td>{{$property['direccion']}}</td>
                    <td>{{$property['nombrePredio']}}</td>
                    <td>
                        <a href="{{route('property.edit',$property['id'])}}"  class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('property.destroy',$property['id'])}}" method="post">
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
        <a href="{{route('property.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

