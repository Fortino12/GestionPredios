@extends('layouts.admin')

@section('contenido')

    <section>
        <div class="wrap_for">
            <div class="title_for">
                Registrar Rol
            </div>
            <div class="form">
                @include('custom.message')
                <form action="{{route('rol.store')}}" method="post">
                    @csrf
                    <div class="input_field">
                        <label for="nombreRol">Nombre del Rol</label>
                        <input type="text" name="nombreRol" class="input" value="{{old('nombreRol')}}" placeholder="Nombre del Rol">
                    </div>
                    <div class="input_field">
                        <label for="slug">Slug del Rol</label>
                        <input type="text" name="slug" class="input" value="{{old('slug')}}" placeholder="Slug del Rol">
                    </div>
                    <div class="input_field">
                        <label for="descripcion">Descripción</label>
                        <input type="text"  name="descripcion" class="input" value="{{old('descripcion')}}" placeholder="Codigo de la actividad">
                   </div>
                    <h3>Full Access</h3>

                    <div class="input_field ">
                        <input type="radio" name="full_access" id="btnSeleccionar" value="Si"
                            @if(old('full_access')=="Si")
                                checked
                            @endif
                        >
                        <label for="fullaccesssi" class="custom-control-label">Si</label>
                    </div>
                    <div class="input_field">
                        <input type="radio" name="full_access" id="btnDeseleccionar" value="No"
                            @if(old('full_access')=="No")
                                checked
                            @endif
                            @if(old('full_access')===null)
                                checked
                            @endif
                        >
                        <label for="fullaccessno" class="custom-control-label">No</label>
                    </div>
                    <h3>Permisos</h3>
                    @foreach($permissions as $permission)
                        <div class="custom-control custom-checkbox permission">
                            <input type="checkbox" name="permission[]" class="input" value="{{$permission['id']}}">
                            <label for="permission" class="custom-control-label">{{$permission['id']}}-{{$permission['nombrePermiso']}}</label>
                        </div>
                    @endforeach
                    
                    <div class="input_field">
                        <input type="submit" value="Registrar Rol" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection