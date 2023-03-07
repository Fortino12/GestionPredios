@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Ingredientes 
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('ingredient.update',$ingredient['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="solido">Ingrediente Solido</label>
                        <input type="text" name="solido" class="input" value="{{old('solido',$ingredient['solido'])}}">
                    </div>
                    <div class="input_field">
                        <label for="cantidadKg">Cantidad en Kg</label>
                        <input type="text" name="cantidadKg" class="input" value="{{old('cantidadkg',$ingredient['cantidadKg'])}}">
                    </div>
                    <div class="input_field">
                        <label for="liquido">Ingrediente Liquido</label>
                        <input type="text" name="liquido" class="input" value="{{old('liquido',$ingredient['liquido'])}}">
                    </div>
                    <div class="input_field">
                        <label for="cantidadLiquido">Cantidad Liquido</label>
                        <input type="text" name="cantidadLiquido" class="input" value="{{old('cantidadLiquido',$ingredient['cantidadLiquido'])}}">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Actualizar Ingrediente" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection