@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('illness.create')}}">Enfermedades</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Enfermedad</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($illnesses as $illness)    
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$illness['enfermedad']}}</td>
                    <td>
                        <a href="{{route('illness.edit',$illness['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('illness.destroy',$illness['id'])}}" method="post">
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
        <a href="{{route('illness.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

