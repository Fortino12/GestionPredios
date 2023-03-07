@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Evaluación Personal
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('personalEvaluation.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label>Predio</label>
                        <div class="cus_select">
                            <select name="trabajador_id">
                                <option selected>Elije Trabajador</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->nombreTrabajador}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="area_id">
                                <option selected>Elija el área</option>
                                @foreach($areas as $area)
                                <option value="{{$area->id}}">{{$area->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label>Actividad</label>
                        <div class="cus_select">
                            <select name="actividad_id">
                                <option selected>Elija Actividad</option>
                                    @foreach($activities as $activity)
                                        <option value="{{$activity->id}}">{{$activity->descripcion}}</option>
                                    @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label for="metaEstablecido">Meta Establecido</label>
                        <input type="text" name="metaEstablecido" class="input" value="{{old('metaEstablecido')}}">
                    </div>
                    <div class="input_field">
                        <label for="metaAlcanzada">Meta Alcanzada</label>
                        <input type="text" name="metaAlcanzada" class="input" value="{{old('metAlcanzada')}}">
                    </div>
                    <div class="input_field">
                        <label for="inspeccion">Inspección</label>
                        <input type="text" name="inspeccion" class="input" value="{{old('inspeccion')}}">
                    </div>
                    <div class="input_field">
                        <label for="calificacion">Calificación</label>
                        <input type="text" name="calificacion" class="input" value="{{old('calificacion')}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Evaluación Personal" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection