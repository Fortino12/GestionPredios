@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('dailyAdvance.create')}}">Avance Diario</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Adance</th>
                    <th>Sección</th>
                    <th>Fecha</th>
                    <th>Actividad</th>
                    <th>Total Semanal</th>
                    <th>Porcentaje Semanal</th>
                    <th>Previo Semanal</th>
                    <th>Porcentaje Acumulado</th>
                    <th>Usuario</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailies as $daily)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$daily['nombreAvance']}}</td>
                    <td>{{$daily['seccion']}}</td>
                    <td>{{$daily['fecha']}}</td>
                    <td>{{$daily['actividad_id']}}</td>
                    <td>{{$daily['totalSemanal']}}</td>
                    <td>{{$daily['porceSemanal']}}</td>
                    <td>{{$daily['porceSemanalPrevio']}}</td>
                    <td>{{$daily['porceAcumulado']}}</td>
                    <td>{{$daily['user_id']}}</td>
                    <td>
                        <a href="{{route('dailyAdvance.edit',$daily['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('dailyAdvance.destroy',$daily['id'] )}}" method="post">
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
        <a href="{{route('dailyAdvance.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

