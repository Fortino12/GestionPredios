@extends('layouts.admin')

@section('contenido')

<section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Actividad
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('activity.update',$activity['id'])}}" method="post">
                        @csrf
                        @method('put')
                    <div class="input_field">
                        <label>Codigo de la Actividad</label>
                        <input type="text" name="codigo" placeholder="Codigo de la Actividad" value="{{old('codigo',$activity['codigo'])}}" required class="input">
                    </div>
                    <div class="input_field">
                        <label for="descripcion">Descripción</label>
                        <input type="text"  name="descripcion" class="input" value="{{old('descripcion',$activity['descripcion'])}}"required placeholder="Codigo de la actividad">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Actividad" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection