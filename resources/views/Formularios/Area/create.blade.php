@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar Área
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('area.store')}}" method="post">
                    @csrf
                    <h3>Seleccione el Predio</h3>

                    @foreach($properties as $property)
                        <div class="custom-control custom-checkbox permission">
                            <input type="radio" name="predio_id" class="custom-control" value="{{$property['id']}}">
                            <label for="predio_id" class="custom-control-label">{{$property['id']}}-{{$property['nombrePredio']}}</label>
                        </div>
                    @endforeach
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
                                        <td><input type="text" name="cota[]" placeholder="Cota" class="form-control name_list" required></td>
                                        <td><input type="text" name="descripcion[]" placeholder="Descripción" class="form-control name_list" required></td>
                                    </tr>
                                </table>
                            </div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Rol" class="btn">
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