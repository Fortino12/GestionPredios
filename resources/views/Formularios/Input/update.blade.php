@extends('layouts.admin2')

@section('contenido')

    <div class="container">
        <div class="row justofy-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-body">
                    @include('custom.message')
                        <h3>Formulario de editar</h3>
                        <form action="{{route('input.update',$input['id'])}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="producto">Nombre del Producto</label>
                                <input type="text" name="producto" class="form-control" value="{{old('producto',$input['producto'])}}">
                            </div>
                            <div class="form-group">
                                <label for="lugarElaboracion">Lugar de fechaElaboración</label>
                                <input type="text" name="lugarElaboracion" class="form-control" value="{{old('lugarElaboracion',$input['lugarElaboracion'])}}">
                            </div>
                            <div class="form-group">
                                <label for="fechaElaboracion">Fecha de Elaboración</label>
                                <input type="date" name="fechaElaboracion" class="form-control" value="{{old('fechaElaboracion',$input['fechaElaboracion'])}}">
                            </div>
                            <div class="form-group">
                                <label for="fechaCosecha">Fecha de la Cosecha</label>
                                <input type="date" name="fechaCosecha" class="form-control" value="{{old('fechaCosecha',$input['fechaCosecha'])}}">
                            </div>
                            <div class="form-group">
                                <label for="volumenCosecha">Volumen de Cosecha</label>
                                <input type="text" name="volumenCosecha" class="form-control" value="{{old('volumenCosecha',$input['volumenCosecha'])}}" placeholder="VolumenCosecha">
                            </div>
                            <div class="form-group">
                                <label for="densidad">Densidad</label>
                                <input type="text" name="densidad" class="form-control" value="{{old('densidad',$input['densidad'])}}">
                            </div>
                            <div class="form-group">
                                <label for="loteAsignado">Lote Asignado</label>
                                <input type="text" name="loteAsignado" class="form-control" value="{{old('loteAsignado',$input['loteAsignado'])}}">
                            </div>
                            <div class="form-group">
                                <label for="funcion">Función</label>
                                <input type="text" name="funcion" class="form-control" value="{{old('funcion',$input['funcion'])}}">
                            </div>
                            <button type="submit" class="btn btn-success">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection