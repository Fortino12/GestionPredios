@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar Macetero
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('flowerpot.store')}}" method="post">
                    @csrf 
                    <div class="input_field">
                        <label for="nombreMacetero">Nombre del Macetero</label>
                        <input type="text" name="nombreMacetero" class="input" value="{{old('nombreMacetero')}}">
                    </div>
                    <div class="input_field">
                        <label>Plaga</label>
                        <div class="cus_select">
                            <select name="Plaga_id">
                                <option selected>Elige la plaga</option>
                                @foreach($plagues as $plague)
                                    <option value="{{$plague['id']}}">{{$plague['nombrePlaga']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label>Enfermedad</label>
                        <div class="cus_select">
                            <select name="enfermedad_id">
                                <option selected>Elije la enfermedad</option>
                                @foreach($illness as $illnes)
                                <option value="{{$illnes['id']}}">{{$illnes['enfermedad']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label>Avance Diario</label>
                        <div class="cus_select">
                            <select name="avanceDiario_id">
                                <option selected>Elije el avance</option>
                                @foreach($dailies as $daily)
                                <option value="{{$daily['id']}}">{{$daily['seccion']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Macetero" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection