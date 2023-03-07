@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Predio
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('property.update',$property['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" class="input" value="{{old('estado',$property['estado'])}}" placeholder="Estado">
                    </div>
                    <div class="input_field">
                        <label for="municipio">Municipio</label>
                        <input type="text" name="municipio" class="input" value="{{old('municipio',$property['municipio'])}}" placeholder="Municipio">
                    </div>
                    <div class="input_field">
                        <label for="direccion">Dirección</label>
                        <input type="text"  name="direccion" class="input" value="{{old('direccion',$property['direccion'])}}" placeholder="Dirección">
                   </div>
                   <div class="input_field">
                        <label for="nombrePredio">Nombre del Predio</label>
                        <input type="text" name="nombrePredio" class="input" value="{{old('nombrePredio',$property['nombrePredio'])}}" placeholder="Nombre del Predio">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Predio" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection