@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registro de Aplicación
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('enforcement.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="area_id">
                                <option selected>Elija el área</option>
                                @foreach($areas as $area)
                                <option value="{{$area['id']}}">{{$area['descripcion']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label for="fechaAplicacion">Fecha Aplicación</label>
                        <input type="date" name="fechaAplicacion" class="input" value="{{old('fechaAplicacion')}}">
                    </div>
                    <div class="input_field">
                        <label for="nombrecomercial">Nombre Comercial</label>
                        <input type="text" name="nombreComercial" class="input" value="{{old('nombreComercial')}}">
                    </div>
                    <div class="input_field">
                        <label for="noRegistro">Número Registro</label>
                        <input type="text" name="noRegistro" class="input" value="{{old('noRegistro')}}">
                    </div>
                    <div class="input_field">
                        <label for="noLote">Número Lote</label>
                        <input type="text" name="noLote" class="input" value="{{old('noLote')}}">
                    </div>
                    <div class="input_field">
                        <label>Toxicologia</label>
                        <div class="cus_select">
                            <select name="toxicologia">
                                <option selected>Elija Toxicologia</option>
                                <option value="Muy Tóxico">Muy Tóxico</option>
                                <option value="Tóxico">Tóxico</option>
                                <option value="Nocivo">Nocivo</option>
                                <option value="Cuidado">Cuidado</option>
                                <option value="No Tóxico">No Tóxico</option>
                            </select>
                        </div>
				    </div>
                    <div class="input_field">
                        <label for="ingrediente">Ingrediente</label>
                        <input type="text" name="ingrediente" class="input" value="{{old('ingrediente')}}">
                    </div>
                    <div class="input_field">
                        <label for="dosis">Dosis</label>
                        <input type="text" name="dosis" class="input" value="{{old('dosis')}}">
                    </div>
                    <div class="input_field">
                        <label for="plagaoEnfermedad">Plaga o Enfermedad</label>
                        <input type="text" name="plagaoEnfermedad" class="input" value="{{old('plagaoEnfermedad')}}">
                    </div>
                    <div class="input_field">
                        <label for="nutricion">Nutrición</label>
                        <input type="text" name="nutricion" class="input" value="{{old('nutricion')}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Aplicación" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection