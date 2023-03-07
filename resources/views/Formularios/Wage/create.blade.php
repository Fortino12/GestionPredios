@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registro de Jornada
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('wage.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label>Actividad</label>
                        <div class="cus_select">
                            <select name="actividad_id">
                                <option selected>Elija la actividad</option>
                                @foreach($activities as $activity)
                                <option value="{{$activity['id']}}">{{$activity['descripcion']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="actividad_id">
                                <option selected>Elejia el área</option>
                                    @foreach($areas as $area)
                                    <option value="{{$area['id']}}">{{$area['descripcion']}}</option>
                                    @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label>Fecha</label>
                        <input type="date" name="fecha" placeholder="Fecha" value="{{old('fecha')}}" required class="input">
                    </div>
                    <div class="input_field">
                        <label for="estatus">Estatus</label>
                        <input type="text"  name="estatus" class="input" value="{{old('estatus')}}" placeholder="Codigo de la actividad">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Jornada" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection