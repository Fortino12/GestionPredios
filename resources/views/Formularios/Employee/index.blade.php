@extends('layouts.admin')

@section('contenido')
    <div class="title1">
        <h2><a href="{{route('employee.create')}}">Trabajadores</h2></a>
    </div>
    @include('custom.message')
    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th scope="col">Curp</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Paterno</th>
                    <th scope="col">Materno</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Area</th>
                    <th colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td scope="row">{{$loop->index+1}}</td>
                    <td>{{$employee['curp']}}</td>
                    <td>{{$employee['nombreTrabajador']}}</td>
                    <td>{{$employee['paternoTrabajador']}}</td>
                    <td>{{$employee['maternoTrabajador']}}</td>
                    <td>{{$employee['sexo']}}</td>
                    <td>{{$employee['telefono']}}</td>
                    <td>{{$employee->areas->descripcion }}</td>
                    <td>
                        <a href="{{route('employee.edit',$employee['id'])}}" class="banner-btn">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('employee.destroy',$employee['id'])}}" method="post">
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
        <a href="{{route('employee.create')}}" class="banner-btn" style="float: right;">Agregar</a> 
    </div>  

@endsection

