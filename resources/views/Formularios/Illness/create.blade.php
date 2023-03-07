@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar Enfermedad
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('illness.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label for="enfermedad">Enfermedad</label>
                        <input type="text" name="enfermedad" class="input" value="{{old('enfermedad')}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Enfermedad" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection