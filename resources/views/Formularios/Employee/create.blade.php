@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar Empleado
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('employee.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label for="curp">Curp</label>
                        <input type="text" name="curp" class="input" value="{{old('curp')}}" placeholder="Curp">
                    </div>
                    <div class="input_field">
                        <label for="nombreTrabajador">Nombre del Trabajador</label>
                        <input type="text" name="nombreTrabajador" class="input" value="{{old('nombreTrabajador')}}" placeholder="Nombre del Trbajador">
                    </div>
                    <div class="input_field">
                        <label for="paternoTrabajador">Apellido Paterno</label>
                        <input type="text" name="paternoTrabajador" class="input" value="{{old('paternoTrabajador')}}" placeholder="Apellido Paterno">
                    </div>
                    <div class="input_field">
                        <label for="maternoTrabajador">Apellido Materno</label>
                        <input type="text" name="maternoTrabajador" class="input" value="{{old('maternoTrabajador')}}" placeholder="Apellido Materno">
                    </div>
                    <div class="input_field">
                        <label>Sexo</label>
                        <div class="cus_select">
                            <select name="sexo">
                                <option selected>Seleccione Sexo</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label for="telefono">Número de Telefono</label>
                        <input type="tel" name="telefono" class="input" value="{{old('telefono')}}" placeholder="Número de Telefono">
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
                        <input type="submit" value="Registrar Empleado" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection