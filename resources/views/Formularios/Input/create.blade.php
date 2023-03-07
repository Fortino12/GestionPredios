@extends('layouts.admin2')

@section('contenido')

    <div class="container">
        <div class="row justofy-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-body">
                    @include('custom.message')
                        <h3>Formulario de </h3>
                        <form action="{{route('input.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="producto">Nombre del Producto</label>
                                <input type="text" name="producto" class="form-control" value="{{old('producto')}}" placeholder="Nombre del Producto">
                            </div>
                            <div class="form-group">
                                <label for="lugarElaboracion">Lugar de Elaboración</label>
                                <select name="lugarElaboracion" class="form-control">
                                    <option selected>Elije el lugar de Elaboración</option>
                                    @foreach($properties as $property)
                                        <option value="{{$property['nombrePredio']}}">{{$property['nombrePredio']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fechaElaboracion">Fecha de Elaboración</label>
                                <input type="date" name="fechaElaboracion" class="form-control" value="{{old('fechaElaboracion')}}" placeholder="Fecha de Elaboración">
                            </div>
                            <div class="form-group">
                                <label for="fechaCosecha">Fecha de la Cosecha</label>
                                <input type="date" name="fechaCosecha" class="form-control" value="{{old('fechaCosecha')}}" placeholder="Fecha de Cosecha">
                            </div>
                            <div class="form-group">
                                <label for="volumenCosecha">Volumen de Cosecha</label>
                                <input type="text" name="volumenCosecha" class="form-control" value="{{old('volumenCosecha')}}" placeholder="VolumenCosecha">
                            </div>
                            <div class="form-group">
                                <label for="densidad">Densidad</label>
                                <input type="text" name="densidad" class="form-control" value="{{old('densidad')}}" placeholder="Densidad">
                            </div>
                            <div class="form-group">
                                <label for="loteAsignado">Lote Asignado</label>
                                <input type="text" name="loteAsignado" class="form-control" value="{{old('loteAsignado')}}" placeholder="Lote Asignado">
                            </div>
                            <div class="form-group">
                                <label for="funcion">Función</label>
                                <input type="text" name="funcion" class="form-control" value="{{old('funcion')}}" placeholder="Función">
                            </div>
                            <div class="class table-responsive">
                                <div class="title_for">
                                    Registro de Ingrediente
                                </div>
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <th>Solido</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Liquido</th>
                                        <th scope="col">Cantidad</th>
                                        <th><button type="button" name="add" id="add" class="btn btn-primary">Añadir</button></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="solido[]" placeholder="Solido" class="form-control name_list" required></td>
                                        <td><input type="text" name="cantidadKg[]" placeholder="Cantidad" class="form-control name_list" required></td>
                                        <td><input type="text" name="liquido[]" placeholder="Liquido" class="form-control name_list" required></td>
                                        <td><input type="text" name="cantidadLiquido[]" placeholder="canditidad" class="form-control name_list" required></td>
                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
		    var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'">'+
                '<td><input type="text" name="solido[]" placeholder="Solido" class="form-control name_list" required></td>'+
                '<td><input type="text" name="cantidadKg[]" placeholder="Cantidad" class="form-control name_list" required></td>'+
                '<td><input type="text" name="liquido[]" placeholder="Liquido" class="form-control name_list" required></td>'+
                '<td><input type="text" name="cantidadLiquido[]" placeholder="Cantidad" class="form-control name_list" required></td>'+
                '<td><butto type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">x</button></td>'+
                '</tr>');
            });
            $(document).on('click','.btn_remove',function(){
                var id=$(this).attr('id');
                $('#row'+id).remove();
            });
	    });
    </script>
@endsection