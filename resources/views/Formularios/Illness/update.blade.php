@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar  Enfermedad
            </div>
            <div class="form">
                @include('custom.message')
                    <form action="{{route('illness.update',$illness['id'])}}" method="post">
                        @csrf
                        @method('put')
                    <div class="input_field">
                        <label for="enfermedad">Enfermedad</label>
                        <input type="text" name="enfermedad" class="input" value="{{old('enfermedad',$illness['enfermedad'])}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Enfermedad" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection