@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registro de Predio
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('property.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" class="input" value="{{old('estado')}}" placeholder="Estado">
                    </div>
                    <div class="input_field">
                        <label for="municipio">Municipio</label>
                        <input type="text" name="municipio" class="input" value="{{old('municipio')}}" placeholder="Municipio">
                    </div>
                    <div class="input_field">
                        <label for="direccion">Dirección</label>
                        <input type="text"  name="direccion" class="input" value="{{old('direccion')}}" placeholder="Dirección">
                   </div>
                   <div class="input_field">
                        <label for="nombrePredio">Nombre del Predio</label>
                        <input type="text" name="nombrePredio" class="input" value="{{old('nombrePredio')}}" placeholder="Nombre del Predio">
                    </div>
                    <div class="class table-responsive">
                                <div class="title_for">
                                    Registro de Áreas
                                </div>
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <th scope="col">Cota</th>
                                        <th scope="col">Descripción</th>
                                        <th><button type="button" name="add" id="add" class="ejemplo">Añadir</button></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="cota[]" placeholder="Cota" class="input name_list"></td>
                                        <td><input type="text" name="descripcion[]" placeholder="Descripción" class="form-control name_list"></td>
                                    </tr>
                                </table>
                            </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Predio" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

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