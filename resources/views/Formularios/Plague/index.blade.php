@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('plague.create')}}">Plaga</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Predio</th>
                    <th>Jornal</th>
                    <th>Area</th>
                    <th>Superficie</th>
                    <th>Cultivo</th>
                    <th>Nombre de Plaga</th>
                    <th>Punto Muestra</th>
                    <th>Enfermedad</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plagues as $plague)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$plague['predio_id']}}</td>
                    <td>{{$plague['jornal']}}</td>
                    <td>{{$plague['area_id']}}</td>
                    <td>{{$plague['superficie']}}</td>
                    <td>{{$plague['cultivo']}}</td>
                    <td>{{$plague['nombrePlaga']}}</td>
                    <td>{{$plague['puntoMuestra']}}</td>
                    <td>{{$plague['nombreEnfermedad']}}</td>
                    <td>
                        <a href="{{route('plague.update',$plague['id'])}}"  class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('plague.destroy',$plague['id'])}}" method="post">
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
        <a href="{{route('plague.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

