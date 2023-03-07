@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar Assitencia
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('assistance.update',$assistance['id'])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" class="input" value="{{old('fecha',$assistance['fecha'])}}">
                    </div>
                    <div class="input_field">
                        <label>{{$assistance->employees->nombreTrabajador}}</label>
                        <input type="hidden" name="trabajador_id" placeholder="Nombre" value="{{$assistance->trabajador_id}}" required class="input">
                    </div>
                    <div class="input_field">
                        <label>Área</label>
                        <div class="cus_select">
                            <select name="area_id">
                                <option selected>{{$assistance->areas->descripcion}}</option>
                                    @foreach($areas as $area)
                                        <option value="{{$area->id}}">{{$area->descripcion}}</option>
                                    @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <label>Estatus</label>
                        <div class="cus_select">
                            <select name="estatus">
                                <option selected>{{$assistance->estatus}}</option>
                                <option value="V">Vacaciones</option>
                                <option value="F">Falta</option>
                                <option value="PJ">Permiso Justificado</option>
                                <option value="JM">Justificante Medico</option>
                                <option value="C">Produ</option>
                                <option value="B">Beneficio</option>
                            </select>
                        </div>
				    </div>
                    
                    <div class="input_field">
                        <input type="submit" value="Actualizar Assitencias" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection