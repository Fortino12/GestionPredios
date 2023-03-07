@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar Avance Diario
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('dailyAdvance.update',$daily['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="nombreAvance">Nombre del Avance</label>
                        <input type="text" name="nombreAvance" class="input" value="{{old('nombreAvance',$daily['nombreAvance'])}}" placeholder="Nombre del Avance">
                    </div>
                    <div class="input_field">
                        <label for="seccion">Sección</label>
                        <input type="text" name="seccion" class="input" value="{{old('seccion',$daily['seccion'])}}" placeholder="Sección">
                    </div>
                    <div class="input_field">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="form-control" value="{{old('fecha',$daily['fecha'])}}">
                    </div>
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="actividad_id">
                                <option selected>Elija Actividad</option>
                                    @foreach($activities as $activity)
                                        <option value="{{$activity['id']}}">{{$activity['descripcion']}}</option>
                                    @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label for="totalSemanal">Total de la Semana</label>
                        <input type="text" name="totalSemanal" class="input" value="{{old('totalSemanal',$daily['totalSemanal')}}" placeholder="Total de la Semana">
                    </div>
                    <div class="input_field">
                        <label for="porceSemanal">Porcentaje Semanal</label>
                        <input type="text" name="porceSemanal" class="input" value="{{old('porceSemanal',$daily['porceSemanal')}}" placeholder="Porcentaje Semanal">
                    </div>
                    <div class="input_field">
                        <label for="porceSemanalPrevio">Porcentaje Semanal Previo</label>
                        <input type="text" name="porceSemanalPrevio" class="input" value="{{old('porceSemanalPrevio',$daily['porceSemanalPrevio')}}">
                    </div>
                    <div class="input_field">
                        <label for="porceAcumulado">Porcentaje Acumulado</label>
                        <input type="text" name="porceAcumulado" class="input" value="{{old('porceAcumulado',$daily['porceAcumulado')}}">
                    </div>
                    <div class="input_field">
                        <label>Empleado</label>
                        <div class="cus_select">
                            <select name="user_id">
                                <option selected>Elija Empleado</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee['id']}}">{{$employee['nombreTrabjador']}}</option>
                                    @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Avance Diario" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection