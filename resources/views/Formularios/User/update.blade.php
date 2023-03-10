@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Actualizar usuario
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('user.update',$user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="input_field">
                        <label for="nombre">Nombre del Usuario</label>
                        <input type="text" name="nombre" class="input" value="{{old('nombre',$user->nombre)}}" placeholder="Nombre del Usuario">
                    </div>
                    <div class="input_field">
                        <label for="paterno">Apellido Paterno</label>
                        <input type="text" name="paterno" class="input" value="{{old('paterno',$user->paterno)}}" placeholder="Apellido Paterno">
                    </div>
                    <div class="input_field">
                        <label for="materno">Apellido Materno</label>
                        <input type="text" name="materno" class="input" value="{{old('materno',$user->materno)}}" placeholder="Apellido Materno">
                    </div>
                    <div class="input_field">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNacimiento" class="input" value="{{old('fechaNacimiento',$user->fechaNacimiento)}}" placeholder="Fecha de Nacimiento">
                    </div>
                    <div class="input_field">
                        <label>Sexo</label>
                        <div class="cus_select">
                            <select name="sexo">
                                <option value="{{$user->sexo}}">{{$user->sexo}}</option>
                                <option value="">Hombre</option>
                                <option value="">Mujer</option>
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label for="telefono">N??mero de Telefono</label>
                        <input type="tel" name="telefono" class="input" value="{{old('telefono',$user->telefono)}}" placeholder="N??mero de Telefono">
                    </div>
                    <div class="input_field">
                        <label>Rol</label>
                        <div class="cus_select">
                            <select name="role_id">
                                <option value="{{$user->role_id}}" selected>{{$user->roles->nombreRol}}</option>
                                @foreach($roles as $role)
                                    <option value="{{$role['id']}}">{{$role['nombreRol']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    @if($user->roles->nombreRol == "Coordinador de Campo")
                                <h3>Registrar ??rea</h3>
                                @foreach($areas as $area)
                                <div class="custom-control custom-checkbox area">
                                    <input type="checkbox" name="area[]" class="custom-control" value="{{$area['id']}}"
                                    @if(is_array(old('area')) && in_array("$area->id",old('area')))
                                            checked
                                        @elseif(is_array($area_user) && in_array("$area->id",$area_user))
                                            checked
                                        @endif>
                                    <label for="permission" class="custom-control-label">{{$area['id']}}-{{$area['descripcion']}}</label>
                                </div>
                                @endforeach
                            @endif
                    <div class="input_field">
                        <input type="submit" value="Registrar Usuario" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection