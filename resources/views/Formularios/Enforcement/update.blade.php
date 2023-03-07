@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Aplicación
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('enforcement.update',$enforcement->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="area_id">
                                <option value="{{$enforcement->area_id}}" selected>{{$enforcement->descripcion}}</option>
                                @foreach($areas as $area)
                                <option value="{{$area['id']}}">{{$area['descripcion']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label for="fechaAplicacion">Fecha Aplicación</label>
                        <input type="date" name="fechaAplicacion" class="input" value="{{old('fechaAplicacion',$enforcement->fechaAplicacion)}}">
                    </div>
                    <div class="input_field">
                        <label for="nombrecomercial">Nombre Comercial</label>
                        <input type="text" name="nombreComercial" class="input" value="{{old('nombreComercial',$enforcement->nombreComercial)}}">
                    </div>
                    <div class="input_field">
                        <label for="noRegistro">Número Registro</label>
                        <input type="text" name="noRegistro" class="input" value="{{old('noRegistro',$enforcement->noRegistro)}}">
                    </div>
                    <div class="input_field">
                        <label for="noLote">Número Lote</label>
                        <input type="text" name="noLote" class="input" value="{{old('noLote',$enforcement->noLote)}}">
                    </div>
                    <div class="input_field">
                        <label>Toxicologia</label>
                        <div class="cus_select">
                            <select name="toxicologia">
                                <option value="{{$enforcement->toxicologia}}" selected>{{$enforcement->toxicologia}}</option>
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
                        <input type="text" name="ingrediente" class="input" value="{{old('ingrediente',$enforcement->ingrediente)}}">
                    </div>
                    <div class="input_field">
                        <label for="dosis">Dosis</label>
                        <input type="text" name="dosis" class="input" value="{{old('dosis',$enforcement->dosis)}}">
                    </div>
                    <div class="input_field">
                        <label for="plagaoEnfermedad">Plaga o Enfermedad</label>
                        <input type="text" name="plagaoEnfermedad" class="input" value="{{old('plagaoEnfermedad',$enforcement->plagaoEnfermedad)}}">
                    </div>
                    <div class="input_field">
                        <label for="nutricion">Nutrición</label>
                        <input type="text" name="nutricion" class="input" value="{{old('nutricion',$enforcement->nutricion)}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Aplicación" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection