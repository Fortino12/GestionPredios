@extends('layouts.admin2')

@section('contenido')

    <div class="container">
        <div class="row justofy-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-body">
                    @include('custom.message')
                        <h3>Registro de Predio </h3>
                        <form action="{{route('property.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" class="form-control" value="{{old('estado')}}" placeholder="Estado">
                            </div>
                            <div class="form-group">
                                <label for="municipio">Municipio</label>
                                <input type="text" name="municipio" class="form-control" value="{{old('municipio')}}" placeholder="Municipio">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Dirección">
                            </div>
                            <div class="form-group">
                                <label for="nombrePredio">Nombre del Predio</label>
                                <input type="text" name="nombrePredio" class="form-control" value="{{old('nombrePredio')}}" placeholder="Nombre del Predio">
                            </div>
                            
                            <div class="class table-responsive">
                                <div class="title_for">
                                    Registro de Ingrediente
                                </div>
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <th scope="col">Cota</th>
                                        <th scope="col">Descripción</th>
                                        <th><button type="button" name="add" id="add" class="btn btn-success">Añadir</button></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="cota[]" placeholder="Cota" class="form-control name_list"></td>
                                        <td><input type="text" name="descripcion[]" placeholder="Descripción" class="form-control name_list"></td>
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
                '<td><input type="text" name="cota[]" placeholder="Cota" class="form-control name_list" required></td>'+
                '<td><input type="text" name="descripcion[]" placeholder="Descripción" class="form-control name_list" required></td>'+
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