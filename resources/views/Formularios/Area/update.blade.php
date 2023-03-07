@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Área
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{{route('area.update',$area['id'])}}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="cota">Cota</label>
                        <input type="text" name="cota" class="input" value="{{old('cota',$area['cota'])}}" placeholder="Cota">
                    </div>
                    <div class="input_field">
                        <label for="descripcion">Descripción</label>
                        <input type="text"  name="descripcion" class="input" value="{{old('descripcion',$area['descripcion'])}}" placeholder="Codigo de la actividad">
                   </div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Área" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection