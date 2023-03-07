@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Ingredientes 
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('ingredient.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label for="solido">Ingrediente Solido</label>
                        <input type="text" name="solido" class="input" value="{{old('solido')}}">
                    </div>
                    <div class="input_field">
                        <label for="cantidadKg">Cantidad en Kg</label>
                        <input type="text" name="cantidadKg" class="input" value="{{old('cantidadkg')}}">
                    </div>
                    <div class="input_field">
                        <label for="liquido">Ingrediente Liquido</label>
                        <input type="text" name="liquido" class="input" value="{{old('liquido')}}">
                    </div>
                    <div class="input_field">
                        <label for="cantidadLiquido">Cantidad Liquido</label>
                        <input type="text" name="cantidadLiquido" class="form-control" value="{{old('cantidadLiquido')}}">
                    </div>
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="insumo_id">
                                <option selected>Elije el insumo</option>
                                @foreach($inputs as $input)
                                <option value="{{$insumo['id']}}">{{$insumo['producto']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Ingrediente" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection