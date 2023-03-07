@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('input.create')}}">Insumos</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Producto</th>
                    <th>Lugar Elaboración</th>
                    <th>Fecha Elaboración</th>
                    <th>Fecha Cosecha</th>
                    <th>Densidad</th>
                    <th>Lote Asignado</th>
                    <th>Función</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inputs as $input) 
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$input['producto']}}</td>
                    <td>{{$input['lugarElaboracion']}}</td>
                    <td>{{$input['fechaElaboracion']}}</td>
                    <td>{{$input['fechaCosecha']}}</td>
                    <td>{{$input['densidad']}}</td>
                    <td>{{$input['loteAsignado']}}</td>
                    <td>{{$input['funcion']}}</td>
                    <td>
                        <a href="{{route('input.edit',$input['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('input.destroy',$input['id'])}}" method="post">
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
        <a href="{{route('input.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

