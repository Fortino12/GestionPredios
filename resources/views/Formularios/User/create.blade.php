@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar usuario
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label for="nombre">Nombre del Usuario</label>
                        <input type="text" name="nombre" class="input" value="{{old('nombre')}}" placeholder="Nombre del Usuario">
                    </div>
                    <div class="input_field">
                        <label for="paterno">Apellido Paterno</label>
                        <input type="text" name="paterno" class="input" value="{{old('paterno')}}" placeholder="Apellido Paterno">
                    </div>
                    <div class="input_field">
                        <label for="materno">Apellido Materno</label>
                        <input type="text" name="materno" class="input" value="{{old('materno')}}" placeholder="Apellido Materno">
                    </div>
                    <div class="input_field">
                        <label for="fechaNacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fechaNacimiento" class="input" value="{{old('fechaNacimiento')}}" placeholder="Fecha de Nacimiento">
                    </div>
                    <div class="input_field">
                        <label>Sexo</label>
                        <div class="cus_select">
                            <select name="sexo">
                                <option selected>Seleccione Sexo</option>
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>
                    </div>
                    <div class="input_field">
                        <label for="telefono">Número de Telefono</label>
                        <input type="tel" name="telefono" class="input" value="{{old('telefono')}}" placeholder="Número de Telefono">
                    </div>
                    <div class="input_field">
                        <label for="email">Correo Electronico</label>
                        <input type="text" name="email" value="{{old('email')}}" class="input" placeholder="Correo Electronico">
                    </div>
                    <div class="input_field">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="input" placeholder="Contraseña">
                    </div>
                    <div class="input_field">
                        <label>Rol</label>
                        <div class="cus_select">
                            <select name="role_id">
                                <option selected>Elija el rol</option>
                                @foreach($roles as $role)
                                    <option value="{{$role['id']}}">{{$role['nombreRol']}}</option>
                                @endforeach
                            </select>
                        </div>
					</div>
                    <div class="input_field">
                        <input type="submit" value="Registrar Usuario" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection