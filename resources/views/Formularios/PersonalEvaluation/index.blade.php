@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('personalEvaluation.create')}}">Evaluación Personal</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Trabajdor</th>
                    <th>Area</th>
                    <th>Actividad</th>
                    <th>Meta Alcanzada</th>
                    <th>Inspección</th>
                    <th>Calificación</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($personals as $personal)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$personal->employees->nombreTrabajador}}</td>
                    <td>{{$personal->areas->descripcion}}</td>
                    <td>{{$personal->activities->descripcion}}</td>
                    <td>{{$personal['metaAlcanzada']}}</td>
                    <td>{{$personal['inspeccion']}}</td>
                    <td>{{$personal['calificacion']}}</td>
                    <td>
                        <a href="{{route('personalEvaluation.edit',$personal['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('personalEvaluation.destroy',$personal['id'])}}" method="post">
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
        <a href="{{route('personalEvaluation.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

