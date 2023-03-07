@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar de Plaga
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('plague.update',$plague['id'])}}" method="post">
                    @csrf
                    @method('put')
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
                        <input type="text" name="jornal" class="input" value="{{old('jornal',$plague['jornal'])}}" placeholder="Nombre del Jornal">
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
                        <input type="text" name="superficie" class="input" value="{{old('superficie',$plague['superficie'])}}" placeholder="Superficie">
                    </div>
                    <div class="input_field">
                        <label for="cultivo">Cultivo</label>
                        <input type="text" name="cultivo" class="input" value="{{old('cultivo',$plague['cultivo'])}}" placeholder="cultivo">
                    </div>
                    <div class="input_field">
                        <label for="nombrePlaga">Nombre de la Plaga</label>
                        <input type="text" name="nombrePlaga" class="input" value="{{old('nombrePlaga',$plague['nombrePlaga'])}}" placeholder="Nombre de la Plaga">
                    </div>
                    <div class="input_field">
                        <label for="puntoMuestra">Punto de Muestra</label>
                        <input type="text" name="puntoMuestra" class="input" value="{{'puntoMuestra',$plague['puntoMuestra']}}" placeholder="Punto de Muestra">
                    </div>
                    <div class="input_field">
                        <label for="nombreEnfermedad">Nombre de la Enfermedad</label>
                        <input type="text" name="nombreEnfermedad" class="input" value="{{old('nombreEnfermedad',$plague['nombreEnfermedad'])}}" placeholder="Nombre de la Enfermedad">
                    </div>
                    
                    <div class="input_field">
                        <input type="submit" value="Actualizar Plaga" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection