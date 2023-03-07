@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registro de Plaga
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('plague.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label>Predio</label>
                        <div class="cus_select">
                            <select name="predio_id">
                                <option selected>Elija el predio</option>
                                @foreach($properties as $property)
                                <option value="{{$property['id']}}">{{$property['nombrePredio']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label for="jornal">Jornal</label>
                        <input type="text" name="jornal" class="input" value="{{old('jornal')}}" placeholder="Nombre del Jornal">
                    </div>
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
                        <label for="superficie">Superficie</label>
                        <input type="text" name="superficie" class="input" value="{{old('superficie')}}" placeholder="Superficie">
                    </div>
                    <div class="input_field">
                        <label for="cultivo">Cultivo</label>
                        <input type="text" name="cultivo" class="input" value="{{old('cultivo')}}" placeholder="cultivo">
                    </div>
                    <div class="input_field">
                        <label for="nombrePlaga">Nombre de la Plaga</label>
                        <input type="text" name="nombrePlaga" class="input" value="{{old('nombrePlaga')}}" placeholder="Nombre de la Plaga">
                    </div>
                    <div class="input_field">
                        <label for="puntoMuestra">Punto de Muestra</label>
                        <input type="text" name="puntoMuestra" class="input" value="{{'puntoMuestra'}}" placeholder="Punto de Muestra">
                    </div>
                    <div class="input_field">
                        <label for="nombreEnfermedad">Nombre de la Enfermedad</label>
                        <input type="text" name="nombreEnfermedad" class="input" value="{{old('nombreEnfermedad')}}" placeholder="Nombre de la Enfermedad">
                    </div>
                    
                    <div class="input_field">
                        <input type="submit" value="Registrar Plaga" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection