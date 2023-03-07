@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('ingredient.create')}}">Ingredientes</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>Ingrediente Solido</th>
                    <th>Cantidad</th>
                    <th>Ingrediente Liquido</th>
                    <th>Cantidad Liquido</th>
                    <th>Insumo</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ingredients as $ingredient)   
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$ingredient['solido']}}</td>
                    <td>{{$ingredient['cantidadKg']}}</td>
                    <td>{{$ingredient['liquido']}}</td>
                    <td>{{$ingredient['cantidadLiquido']}}</td>
                    <td>{{$ingredient->inputs->producto}}</td>
                    <td>
                        <a href="{{route('ingredient.edit',$ingredient['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('ingredient.destroy',$ingredient['id'])}}" method="post">
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
        <a href="{{route('ingredient.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

