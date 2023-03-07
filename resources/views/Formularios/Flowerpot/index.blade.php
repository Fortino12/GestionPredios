@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('flowerpot.create')}}">Maceteros</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Area</th>
                    <th>Aplicación</th>
                    <th>Nombre Comercial</th>
                    <th>No. Registro</th>
                    <th>No. Lote</th>
                    <th>Toxicologia</th>
                    <th>Ingrediente</th>
                    <th>Dosis</th>
                    <th >Plaga o Enfermedad</th>
                    <th>Nutrición</th>
                    <th>responsable</th>
                    <th>Autorizo</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enforcements as $enforcement)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$enforcement['area_id']}}</td>
                    <td>{{$enforcement['fechaAplicacion']}}</td>
                    <td>{{$enforcement['nombreComercial']}}</td>
                    <td>{{$enforcement['noRegistro']}}</td>
                    <td>{{$enforcement['noLote']}}</td>
                    <td>{{$enforcement['toxicologia']}}</td>
                    <td>{{$enforcement['ingrediente']}}</td>
                    <td>{{$enforcement['dosis']}}</td>
                    <td>{{$enforcement['plagaoEnfermedad']}}</td>
                    <td>{{$enforcement['nutricion']}}</td>
                    <td>{{$enforcement['responsable']}}</td>
                    <td>{{$enforcement['autorizo']}}</td>
                    <td>
                        <a href="{{route('enforcement.edit',$enforcement['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('enforcement.destroy',$enforcement['id'])}}" method="post">
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
        <a href="{{route('flowerpot.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

