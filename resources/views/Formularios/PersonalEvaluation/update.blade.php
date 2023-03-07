@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualización Evaluación Personal
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('personalEvaluation.update',$personal['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label>Predio</label>
                        <div class="cus_select">
                            <select name="trabajador_id">
                                <option value="{{$personal->trabajador_id}}" selected>{{$personal->employees->nombreTrabajador}}</option>
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
                                <option value="{{$personal->area_id}}" selected>{{$personal->areas->descripcion}}</option>
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
                            <option value="{{$personal->actividad_id}}" selected>{{$personal->activities->descripcion}}</option>
                                    @foreach($activities as $activity)
                                        <option value="{{$activity->id}}">{{$activity->descripcion}}</option>
                                    @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label for="metaEstablecido">Meta Establecido</label>
                        <input type="text" name="metaEstablecido" class="input" value="{{old('metaEstablecido',$personal['metaEstablecido'])}}">
                    </div>
                    <div class="input_field">
                        <label for="metaAlcanzada">Meta Alcanzada</label>
                        <input type="text" name="metaAlcanzada" class="input" value="{{old('metAlcanzada',$personal['metaAlcanzada'])}}">
                    </div>
                    <div class="input_field">
                        <label for="inspeccion">Inspección</label>
                        <input type="text" name="inspeccion" class="input" value="{{old('inspeccion',$personal['inspeccion'])}}">
                    </div>
                    <div class="input_field">
                        <label for="calificacion">Calificación</label>
                        <input type="text" name="calificacion" class="input" value="{{old('calificacion',$personal['calificacion'])}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Evaluación Personal" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection